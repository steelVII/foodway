<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\FoodCategories;
use App\Restaurants;
use Illuminate\Http\Request;

class FoodCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Restaurants $restaurants)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);
        $restaurant_category = $restaurant->menu_category()->paginate(10);

        return view('backend.Food_Category.food_categories', compact('restaurant_category'));

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
    public function store(Request $request, $res_id)
    {

        $restaurant_name = Restaurants::select('restaurant_name')->where('id', $res_id)->value('restaurant_name');

        $food_cat = request('food_category');

        foreach ($food_cat as $cat) {

        FoodCategories::create([

            'category_name' => $cat['name'],
            'restaurant_id' => $res_id,
            'restaurant_name' => $restaurant_name

        ]);

        }

        return redirect(route('sort_menu'));

    }

    public function availability(Request $request){

        if($request->ajax())
        {

            $food_cat = FoodCategories::find($request->id);

            if($food_cat->is_available === 1){

                $food_cat->is_available= 0;

            }

            else {

                $food_cat->is_available = 1;

            }

            $food_cat->save();

            return 'success';

        }

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
