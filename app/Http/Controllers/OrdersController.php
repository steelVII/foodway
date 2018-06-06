<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Restaurants;
use App\Vendor;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function index() {

        return view('backend.Orders.orders');

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function admin_allOrderData()
    {

        return Datatables::of(Orders::query())->addColumn('action', function ($order) {
            return '<a href="view_order_details/'.$order->id.'" class="btn btn-primary">View</a>';
        })
        ->make(true);
    }

    public function all_pending_orders() {

        return view('backend.Orders.pending_orders');

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function admin_allPendingData()
    {

        $pending_orders = Orders::where('order_status','Pending');

        return Datatables::of($pending_orders)->addColumn('action', function ($order) {
            return '<a href="view_order_details/'.$order->id.'" class="btn btn-primary">View</a>';
        })
        ->make(true);

    }

    public function all_completed_orders() {

        return view('backend.Orders.completed_orders');
        
    }

        /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function admin_allCompletedData()
    {

        $completed_orders = Orders::where('order_status','Delivered');

        return Datatables::of($completed_orders)->addColumn('action', function ($order) {
            return '<a href="view_order_details/'.$order->id.'" class="btn btn-primary">View</a>';
        })
        ->make(true);

    }

    public function restaurant_order(Restaurants $restaurants, Request $request)
    {

        return view('backend.Orders.orders');
        
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allOrderData(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);
        $all_order = $orders->orders();

        return Datatables::of($all_order)->addColumn('action', function ($order) {
            return '<a href="view_order_details/'.$order->id.'" class="btn btn-primary">View</a>';
        })
        ->make(true);
    }

    public function pending_orders(Restaurants $restaurants, Request $request) {

        return view('backend.Orders.pending_orders');

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allPendingOrderData(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);
        $pending_orders = $orders->orders()->where('order_status','Pending');

        return Datatables::of($pending_orders)->addColumn('action', function ($order) {
            return '<a href="view_order_details/'.$order->id.'" class="btn btn-primary">View</a>';
        })
        ->make(true);

    }

    public function completed_orders(Restaurants $restaurants, Request $request) {

        return view('backend.Orders.completed_orders');
        
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allCompletedOrderData(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);
        $completed_orders = $orders->orders()->where('order_status','Delivered');

        return Datatables::of($completed_orders)->addColumn('action', function ($order) {
            return '<a href="view_order_details/'.$order->id.'" class="btn btn-primary">View</a>';
        })
        ->make(true);
        
    }

    public function view_order_details($order_id) {

        $order_details = Orders::find($order_id);

        return view('backend.Orders.order_details',compact('order_details'));

    }

    public function set_delivered($order_id) {

        $delivery = Orders::find($order_id);

        $delivery->order_status = "Delivered";

        $delivery->save();

        return back();

    }

}
