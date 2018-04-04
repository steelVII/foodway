<?php

namespace App\Http\Controllers;

use App\User;
use App\Locations;
use App\Restaurants;
use App\FoodCategories;
use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurants = Restaurants::all();

        return view('backend.Restaurants.restaurants', compact('restaurants'));
        
    }

    public function restaurant(Restaurants $restaurants, Request $request) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);

        $cat_menu = $restaurant->menu()->select('food_categories')->orderBy('food_categories','ASC')->get();

        $cat_array = array();

        foreach($cat_menu as $cat) {

            $cat_array[] = $cat->food_categories;

        }

        $menu_cat = array_unique($cat_array);

        $menu = $restaurant->menu()->orderBy('order_pos','ASC')->get();

        return view('backend.Restaurants.view_restaurant', compact('restaurant','menu_cat','menu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Restaurants.add_restaurants');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurants = new Restaurants();

        $request->file('restaurantimage')->storeAs('public',$request->file('restaurantimage')->getClientOriginalName());

        Restaurants::create([

            'restaurant_name' => request('restaurant_name'),
            'food_categories' => $cat_list,
            'email' => request('email'),
            'phone_num' => request('phone_number'),
            'restaurant_image' => $request->file('restaurantimage')->getClientOriginalName(),

        ]);

        return redirect('admin/restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurants $restaurants, $id)
    {

        $restaurant = $restaurants::find($id);

        $cat_menu = $restaurant->menu()->select('food_categories')->orderBy('food_categories','ASC')->get();

        $cat_array = array();

        foreach($cat_menu as $cat) {

            $cat_array[] = $cat->food_categories;

        }

        $menu_cat = array_unique($cat_array);

        $menu = $restaurant->menu()->orderBy('food_name','ASC')->get();

        return view('backend.Restaurants.view_restaurant', compact('restaurant','menu_cat','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);
        $locations = Locations::select('state')->orderBy('state','ASC')->get();

        return view('backend.Restaurants.edit_restaurant', compact('restaurant','locations'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurants $restaurants, $id)
    {
        $restaurant = $restaurants::find($id);

        $restaurant->restaurant_name = request('restaurant_name');

        if(request('opening')){

            $opening = Carbon::parse(request('opening'));

            $restaurant->opening_hours = $opening->format('H:i');

        }

        if(request('closing')){

            $closing = Carbon::parse(request('closing'));

            $restaurant->closing_hours = $closing->format('H:i');

        }


        $user = $request->user();

        if($user->email !== request('email')) {

            $restaurant->email = request('email');

            $user->email = request('email');
            $user->save();

        }

        if(request('phone_number')) { $restaurant->phone_num = request('phone_number'); }
        if(request('address')) { $restaurant->address = request('address'); }
        if(request('state')) { $restaurant->state = request('state'); }
        if(request('city')) { $restaurant->city = request('city'); }
        if(request('postcode')) { $restaurant->postcode = request('postcode'); }

        $cat_list = null;

        if(request('restaurantlogo')) {

            $logo = str_replace("'", '', $request->file('restaurantlogo')->getClientOriginalName());

            $restaurant->restaurant_logo = $logo;

            $request->file('restaurantlogo')->storeAs('public',str_replace("'", '',$request->file('restaurantlogo')->getClientOriginalName()));

        }

        if(request('restaurantimage')) {

            $image = str_replace("'", '', $request->file('restaurantimage')->getClientOriginalName());

            $restaurant->restaurant_image = $image;

            $request->file('restaurantimage')->storeAs('public',str_replace("'", '',$request->file('restaurantimage')->getClientOriginalName()));

        }

        $restaurant->save();

        return redirect(route('restaurant'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurants $restaurants)
    {
        //
    }
}
