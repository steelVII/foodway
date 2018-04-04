<?php

namespace App\Http\Controllers;

use App\FoodLists;
use App\FoodCategories;
use App\Restaurants;
use App\Vendor;
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

    public function singlelist(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);
        $food_lists = $restaurant->menu()->paginate(10);

        return view('backend.Food_List.food_list',compact('food_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $food_cats = Restaurants::select('food_categories')->where('vendor_id', $vendor_id)->value('food_categories');

        $food_cats = json_decode($food_cats);

        return view('backend.Food_List.add_food_list', compact('restaurant','food_cats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $restaurant = Restaurants::find($id);

        //$food_cat = request('food_category');

        if(request('foodimage')) {

            FoodLists::create([

                'food_name' => request('food-list-item'),
                'description' => request('dish_description'),
                'price' => request('price'),
                'food_image' => $request->file('foodimage')->getClientOriginalName(),
                'restaurant_id' => $restaurant->id,
                'restaurant_name' => $restaurant->restaurant_name,
                'food_categories' => request('food_category'),
    
            ]);

            $request->file('foodimage')->storeAs('public/foods',$request->file('foodimage')->getClientOriginalName());

        }

        else{

            FoodLists::create([

                'food_name' => request('food-list-item'),
                'description' => request('dish_description'),
                'price' => request('price'),
                'restaurant_id' => $restaurant->id,
                'restaurant_name' => $restaurant->restaurant_name,
                'food_categories' => request('food_category'),
    
            ]);

        }

        return redirect(route('restaurant'));

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
    public function edit(FoodLists $foodLists, Request $request, $id)
    {

        $foodlist = $foodLists::find($id);

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');

        $food_cats = Restaurants::select('food_categories')->where('vendor_id', $vendor_id)->value('food_categories');

        $food_cats = json_decode($food_cats);

        return view('backend.Food_List.edit_food_list',compact('foodlist','food_cats'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodLists $foodLists, $id)
    {

        $foodlist = $foodLists::find($id);

        $foodlist->food_name = request('food-list-item');
        $foodlist->description = request('dish_description');
        $foodlist->price = request('price');

        if(request('salesprice')) {

            $foodlist->sales_price = request('salesprice');

        } else{

            $foodlist->sales_price = null;

        }

        if(request('food_category')) {

            $foodlist->food_categories = request('food_category');

        }

        if(request('foodimage')) {

            $foodlist->food_image = $request->file('foodimage')->getClientOriginalName();

            $request->file('foodimage')->storeAs('public/foods',$request->file('foodimage')->getClientOriginalName());

        }

        $foodlist->save();

        return redirect(route('restaurant'));

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

    public function sort(Request $request, FoodLists $foodLists, Restaurants $restaurants){

        if($request->ajax())
        {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);

        $menu = $restaurant->menu()->where('food_categories','=',$request->category)->get();

        $position = $request->position;
        $ids = $request->ids;

        $position = array_map('intval',  $position );
        $position = array_keys($position);

        $integerIDs = array_map('intval',  $ids );

        foreach( $integerIDs as $order) {

            $order_position = array_shift($position);

            $foodlist = $foodLists::find($order);
        
                $foodlist->order_pos = $order_position;

                $foodlist->save();

        }

        return 'success';

        }

    }
}
