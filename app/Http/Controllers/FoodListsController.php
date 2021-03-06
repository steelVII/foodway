<?php

namespace App\Http\Controllers;

use App\FoodLists;
use App\FoodCategories;
use App\Restaurants;
use App\Vendor;
use Yajra\Datatables\Facades\Datatables;
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
        return view('backend.Food_List.food_list');
    }

    public function foodlistData()
    {

        return Datatables::of(FoodLists::query())->addColumn('action', function ($foodList) {

             if($foodList->is_available == 1) {
                return '<a href="restaurant/'.$foodList->restaurant_id.'/food_list/'.$foodList->id.'" class="btn btn-primary">Edit</a>
                <input class="is_available" type="checkbox" data-id="'.$foodList->id.'" checked data-toggle="toggle" data-size="small">';
            }

            else {

                return '<a href="restaurant/'.$foodList->restaurant_id.'/food_list/'.$foodList->id.'" class="btn btn-primary">Edit</a>
                <input class="is_available" type="checkbox" data-id="'.$foodList->id.'" data-toggle="toggle" data-size="small">';

            }
        })
        ->make(true);
    }

    public function singlelist(Restaurants $restaurants, Request $request)
    {

        return view('backend.Food_List.food_list');
        
    }

    public function vendorfoodlistData(Restaurants $restaurants, Request $request)
    {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);
        $food_lists = $restaurant->menu();

        return Datatables::of($food_lists)->addColumn('action', function ($foodList) {

             if($foodList->is_available == 1) {
                return '<a href="food_list/'.$foodList->id.'" class="btn btn-primary">Edit</a>
                <input class="is_available" type="checkbox" data-id="'.$foodList->id.'" checked data-toggle="toggle" data-size="small">';
            }

            else {

                return '<a href="food_list/'.$foodList->id.'" class="btn btn-primary">Edit</a>
                <input class="is_available" type="checkbox" data-id="'.$foodList->id.'" data-toggle="toggle" data-size="small">';

            }
        })
        ->make(true);
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
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $food_cats = FoodCategories::all()->where('restaurant_id', $restaurant_id);

        return view('backend.Food_List.add_food_list', compact('restaurant_id','food_cats'));

    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_create_dish(Request $request, $res_id)
    {

        $restaurant_id = $res_id;

        $food_cats = FoodCategories::all()->where('restaurant_id', $res_id);

        return view('backend.Food_List.add_food_list', compact('restaurant_id','food_cats'));

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
    public function edit(FoodLists $foodLists, Request $request, $id) {

        $foodlist = $foodLists::find($id);

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $food_cats = FoodCategories::all()->where('restaurant_id', $restaurant_id);

        //$food_cats = json_decode($food_cats);

        return view('backend.Food_List.edit_food_list',compact('foodlist','food_cats'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodLists $foodLists, $id) {

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_store_dish(Request $request, $res_id)
    {

        $restaurant = Restaurants::find($res_id);

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

        return redirect(route('single_restaurant', $restaurant->id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function admin_edit(FoodLists $foodLists, Request $request, $res_id , $id) {

        $foodlist = $foodLists::find($id);

        $food_cats = FoodCategories::all()->where('restaurant_id', $res_id);

        return view('backend.Food_List.edit_food_list',compact('foodlist','food_cats'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodLists  $foodLists
     * @return \Illuminate\Http\Response
     */
    public function admin_update(Request $request, FoodLists $foodLists, $res_id, $id) {

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

        return redirect(route('single_restaurant',$res_id));

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

    public function availability(Request $request, FoodLists $foodLists){

        if($request->ajax())
        {

            $foodlist = $foodLists::find($request->id);

            if($foodlist->is_available === 1){

                $foodlist->is_available= 0;

            }

            else {

                $foodlist->is_available = 1;

            }

            $foodlist->save();

            return 'success';

        }

    }

}
