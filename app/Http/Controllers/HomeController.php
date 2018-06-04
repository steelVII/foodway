<?php

namespace App\Http\Controllers;

use App\Restaurants;
use App\FoodLists;
use App\FoodCategories;
use App\Orders;
use App\Locations;
use App\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cities = City::all()->where('is_available',1);

        $random_place = [];

        foreach ($cities as $city) {
            
            array_push($random_place, $city->city_name);

        }

        shuffle($random_place);

        return view('homepage.mainpage', compact('cities','random_place'));
        
    }

    public function show(Restaurants $restaurants) {

        $restaurants = Restaurants::all()->where('food_categories', '!=', null);

        return view('homepage.restaurants', compact('restaurants'));

    }

    public function restaurants_place(Restaurants $restaurants) {

        $location = request('places');

        $restaurants = Restaurants::all()->where('city', '=', $location);

        return view('homepage.restaurants', compact('restaurants'));

    }

    public function restaurants_by_link(Restaurants $restaurants, $location_link) {

        $location = $location_link;

        $restaurants = Restaurants::all()->where('city', '=', $location);

        return view('homepage.restaurants', compact('restaurants'));

    }

    public function single(Restaurants $restaurants, $name) {

        $single = $restaurants::where('restaurant_name',$name)->first();

        $restaurant = $restaurants::find($single->id);

        $menu = $restaurant->menu()->where('is_available', 1)->orderBy('order_pos','ASC')->get();

        //Where SQL multiple queries
        $available_cat = ['restaurant_id' => $single->id, 'is_available' => 1];

        $menu_cat = FoodCategories::where($available_cat)->orderBy('order_pos','ASC')->get();

        return view('homepage.single', compact('single','menu_cat','menu'));

    }

    public function customer_dashboard(Request $request) {

        $user = $request->user();
        $orders = Orders::where('user_id',$user->id)->get();

        //dd($user);

        return view('homepage.customer_dashboard', compact('user','orders'));

    }

}
