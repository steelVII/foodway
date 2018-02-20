<?php

namespace App\Http\Controllers;

use App\Restaurants;
use App\FoodCategories;
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

        ]);

        return redirect('admin/restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurants $restaurants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurants $restaurants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurants  $restaurants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurants $restaurants)
    {
        //
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
