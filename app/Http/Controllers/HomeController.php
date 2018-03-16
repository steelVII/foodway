<?php

namespace App\Http\Controllers;

use App\Restaurants;
use App\FoodLists;
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
        return view('homepage.mainpage');
    }

    public function show(Restaurants $restaurants) {

        $restaurants = $restaurants::all();

        return view('homepage.restaurants', compact('restaurants'));

    }

    public function single(Restaurants $restaurants, $name) {

        $single = $restaurants::where('restaurant_name',$name)->first();

        $restaurant = $restaurants::find($single->id);

        $menu = $restaurant->menu()->orderBy('order_pos','ASC')->get();

        $cat_menu = $restaurant->menu()->select('food_categories')->orderBy('food_categories','ASC')->get();

        $cat_array = array();

        foreach($cat_menu as $cat) {

            $cat_array[] = $cat->food_categories;

        }

        $menu_cat = array_unique($cat_array);

        return view('homepage.single', compact('single','menu_cat','menu'));

    }

}
