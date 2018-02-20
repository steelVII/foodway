<?php

namespace App\Http\Controllers;

use App\FoodCategories;
use Illuminate\Http\Request;

class FoodCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $food_cat = FoodCategories::all();

        return view('backend.Food_Category.food_categories',compact('food_cat'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Food_Category.add_food_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new FoodCategories();

        FoodCategories::create([

            'category_name' => request('food-category')

        ]);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodCategories  $foodCategories
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategories $foodCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodCategories  $foodCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodCategories $foodCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodCategories  $foodCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodCategories $foodCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodCategories  $foodCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodCategories $foodCategories)
    {
        //
    }
}
