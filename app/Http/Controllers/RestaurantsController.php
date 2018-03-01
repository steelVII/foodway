<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurants;
use App\FoodCategories;
use App\Vendor;
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
        $menu = $restaurant->menu()->paginate(10);

        return view('backend.Restaurants.view_restaurant', compact('restaurant','menu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $food_cats = FoodCategories::orderBy('category_name', 'ASC')->get();

        return view('backend.Restaurants.add_restaurants', compact('food_cats'));
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

        $cat_list = null;
        $food_cats = request('food_categories');
        
        foreach($food_cats as $cat) {

            if ($cat === end($food_cats)) {
                $cat_list .= $cat;
                break;
            }

            $cat_list .= $cat . ", ";

        }

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

        $menu = $restaurant->menu()->paginate(10);

        return view('backend.Restaurants.view_restaurant', compact('restaurant','menu'));
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
        $food_cats = FoodCategories::orderBy('category_name', 'ASC')->get();

        return view('backend.Restaurants.edit_restaurant', compact('restaurant','food_cats'));

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

        $user = $request->user();

        if($user->email !== request('email')) {

            $restaurant->email = request('email');

            $user->email = request('email');
            $user->save();

        }

        $restaurant->phone_num = request('phone_number');

        $cat_list = null;

        if(request('food_categories')) {

        $food_cats = request('food_categories');
        
            foreach($food_cats as $cat) {

                if ($cat === end($food_cats)) {
                    $cat_list .= $cat;
                    break;
                }

                $cat_list .= $cat . ", ";

            }

            $restaurant->food_categories = $cat_list;

         }

        if(request('restaurantimage')) {

            $request->file('restaurantimage')->storeAs('public',$request->file('restaurantimage')->getClientOriginalName());

            $restaurant->restaurant_image = $request->file('restaurantimage')->getClientOriginalName();

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
