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

        $restaurants = Restaurants::all()->where('food_categories', '!=', null);

        return view('homepage.restaurants', compact('restaurants'));

    }

    public function single(Restaurants $restaurants, $name) {

        $single = $restaurants::where('restaurant_name',$name)->first();

        $restaurant = $restaurants::find($single->id);

        $menu = $restaurant->menu()->orderBy('order_pos','ASC')->get();

        $cat_menu = Restaurants::select('food_categories')->where('id', $single->id)->value('food_categories');

        if( !empty($cat_menu) || $cat_menu != null) {

            $menu_cat = json_decode($cat_menu);

            usort($menu_cat, function($a, $b) { //Sort the array using a user defined function
                return $a->order < $b->order ? -1 : 1; //Compare the scores
            }); 

        }

        else {

            $menu_cat = null;

        }

        return view('homepage.single', compact('single','menu_cat','menu'));

    }

}
