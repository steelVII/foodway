<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Restaurants;
use App\Vendor;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function index() {

        $order = Orders::paginate(10);

        return view('backend.Orders.orders',compact('order'));

    }

    public function all_pending_orders() {

        $pending_orders = Orders::where('order_status','Pending')->paginate(10);

        return view('backend.Orders.pending_orders',compact('pending_orders'));

    }

    public function all_completed_orders() {

        $completed_orders = Orders::where('order_status','Delivered')->paginate(10);

        return view('backend.Orders.completed_orders',compact('completed_orders'));
        
    }

    public function restaurant_order(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);
        $order = $orders->orders()->paginate(10);

        return view('backend.Orders.orders',compact('order'));
        
    }

    public function pending_orders(Restaurants $restaurants, Request $request) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);
        $pending_orders = $orders->orders()->where('order_status','Pending')->paginate(10);

        return view('backend.Orders.pending_orders',compact('pending_orders'));

    }

    public function completed_orders(Restaurants $restaurants, Request $request) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);
        $completed_orders = $orders->orders()->where('order_status','Delivered')->paginate(10);

        return view('backend.Orders.completed_orders',compact('completed_orders'));
        
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
