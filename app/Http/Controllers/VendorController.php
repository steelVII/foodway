<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use App\Restaurants;
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

    public function owner() {

        return view('backend.Vendor.vendor_owner');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $user = User::find($id);
        
        Vendor::create([

            'vendor_name' => $user->name,
            'user_id' => $id,

        ]);

        $user->acc_type = 3;
        $user->save();

        $vendor = Vendor::where('user_id', $id)->first();

        Restaurants::create([

            'restaurant_name' =>$user->name,
            'vendor_id' => $vendor->id,
            'vendor_name' => $vendor->vendor_name,
            'email' => $user->email,

        ]);

        $user->vendor_appli= 3;
        $user->save();

        return back();
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