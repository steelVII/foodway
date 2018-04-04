<?php

namespace App\Http\Controllers;

use App\Restaurants;
use App\Vendor;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function index() {

        return view('backend.Menu.menu');

    }

    public function show() {

        return view('backend.Menu.add_menu');

    }

    public function store(Request $request, Restaurants $restaurants) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant_category = Restaurants::select('food_categories')->where('id', $restaurant_id)->value('food_categories');

        $restaurant = $restaurants::find($restaurant_id);

        $menu_category = $request->food_category;

        dd($menu_category);

        foreach($menu_category as $key => $value) {

            if($value['name'] == null) {

                array_splice($menu_category,$key);

            }

        }

        if(!empty($menu_category) || $menu_category != null) {

            $menu_category = json_encode($menu_category);

            if($restaurant_category != null || !empty($restaurant_category)) {

                $curr_cat = json_decode($restaurant_category);
                $new_cat =json_decode($menu_category);
                $end_cat = array_merge($curr_cat, $new_cat);

                $restaurant->food_categories = json_encode($end_cat);

            }

            else {

                $restaurant->food_categories = $menu_category;

            }

        }

        else { return back(); }

        $restaurant->save();

        return redirect(route('menu'));

    }

}
