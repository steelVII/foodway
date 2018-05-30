<?php

namespace App\Http\Controllers;

use App\Restaurants;
use App\Vendor;
use App\FoodCategories;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function index(Request $request, Restaurants $restaurants) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant_category = FoodCategories::all()->where('restaurant_id', $restaurant_id)->sortBy('order_pos');
        
        return view('backend.Menu.menu', compact('restaurant_category'));

    }

    public function show(Request $request) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        return view('backend.Menu.add_menu', compact('restaurant_id'));

    }

    public function store(Request $request, Restaurants $restaurants) {

    }

    public function sort(Request $request, Restaurants $restaurants) {

        if($request->ajax())
        {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $menu_category = FoodCategories::all()->where('id', $restaurant_id );

        $ids = $request->id;
        $order = $request->orders;
        
        $integerIDs = array_map('intval',  $ids );

        $order = array_map('intval', $order );
        $order = array_keys($order);

        foreach( $integerIDs as $cat_id ) {

            $order_position = array_shift($order);

            $food_cat = FoodCategories::find($cat_id);
        
            $food_cat->order_pos = $order_position;

            $food_cat->save();

        }

        return 'success';

        }

    }

}
