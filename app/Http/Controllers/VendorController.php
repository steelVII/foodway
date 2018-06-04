<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use App\Restaurants;
use App\Orders;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::paginate(10);

        return view('backend.Vendor.vendor', compact('vendors'));
    }

    public function owner(Request $request, Restaurants $restaurants) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $orders = $restaurants::find($restaurant_id);

        $all_orders = $orders->orders()->get();
        //dd( $all_orders);
        $all_orders_count = $all_orders->count();
        $order_total = 0;

        foreach($all_orders as $order) {

            $total = $order->total;
            $total = number_format((float)$total, 2, '.', '');
            $order_total += $total;

        }

        $pending_orders = $orders->orders()->where('order_status','Pending')->count();
        $delivered_orders = $orders->orders()->where('order_status','Delivered')->count();
        $order_total = number_format((float)$order_total, 2, '.', '');;

        return view('backend.Vendor.vendor_owner',compact('all_orders_count','pending_orders','delivered_orders','order_total'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_vendor_creation()
    {
        return view('backend.Vendor.add_new_vendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::create([
            'name' => request('vendor_username'),
            'email' => request('vendor_email'),
            'password' => bcrypt(request('vendor_password')),
        ]);

        //$user = User::find($id);
        
        Vendor::create([

            'vendor_name' => $user->name,
            'user_id' => $user->id,

        ]);

        $user->acc_type = 3;
        $user->save();

        $vendor = Vendor::where('user_id', $user->id)->first();

        Restaurants::create([

            'restaurant_name' =>$user->name,
            'vendor_id' => $vendor->id,
            'vendor_name' => $vendor->vendor_name,
            'email' => $user->email,

        ]);

        $user->vendor_appli= 3;
        $user->save();

        return redirect(route('vendors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor, $id)
    {
        $restaurant = Restaurants::find($id);

        $menu = $restaurant->menu()->paginate(10);

        return view('backend.Restaurants.view_restaurant', compact('restaurant','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
