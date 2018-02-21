<?php

namespace App\Http\Controllers;

use App\FoodLists;
use App\FoodCategories;
use App\Restaurants;
use Illuminate\Http\Request;

class FoodListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food_lists = FoodLists::paginate(10);

        return view('backend.Food_List.food_list',compact('food_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $restaurants = Restaurants::orderBy('restaurant_name', 'ASC')->get();
        $food_cats = FoodCategories::orderBy('category_name', 'ASC')->get();

        return view('backend.Food_List.add_food_list', compact('restaurants','food_cats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $restaurant_id = Restaurants::select('id')->where('restaurant_name', request('restaurant'))->value('id');

        $cat_list = null;
        $food_cats = request('food_categories');

        foreach($food_cats as $cat) {

            if ($cat === end($food_cats)) {
                $cat_list .= $cat;
                break;
            }

            $cat_list .= $cat . ", ";

        }
        
        FoodLists::create([

            'food_name' => request('food-list-item'),
            'restaurant_id' => $restaurant_id,
            'restaurant_name' => request('restaurant'),
            'food_categories' => $cat_list,

        ]);

        return redirect('admin/food_list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function show(FoodLists $foodLists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodLists $foodLists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodLists $foodLists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodLists $foodLists)
    {
        //
    }
}
