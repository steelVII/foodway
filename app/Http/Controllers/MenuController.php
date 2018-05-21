<?php

namespace App\Http\Controllers;

use App\Restaurants;
use App\Vendor;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function index(Request $request, Restaurants $restaurants) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $restaurant = $restaurants::find($restaurant_id);

        //$cat_menu = $restaurant->menu()->select('food_categories')->orderBy('food_categories','ASC')->get();
        $restaurant_category = Restaurants::select('food_categories')->where('id', $restaurant_id)->value('food_categories');
        
        if( !empty($restaurant_category) || $restaurant_category != null ) {
        
        $restaurant_category = json_decode($restaurant_category);

            usort($restaurant_category, function($a, $b) { //Sort the array using a user defined function
                return $a->order < $b->order ? -1 : 1; //Compare the scores
            }); 

        }

        else {

            $restaurant_category = null;

        }

        return view('backend.Menu.menu', compact('restaurant_category'));

    }

    public function show() {

        return view('backend.Menu.add_menu');

    }

    public function store(Request $request, Restaurants $restaurants) {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        //Pulls the full menu category for single restaurant based on ID
        $restaurant_category = Restaurants::select('food_categories')->where('id', $restaurant_id)->value('food_categories');
        //$restaurant_category2 = Restaurants::select('food_categories')->where('id', $restaurant_id)->value('food_categories');        

        $restaurant = $restaurants::find($restaurant_id);

        $menu_category = $request->food_category;

        //dd($menu_category);

        /* foreach($menu_category as $key => $value) {

            if($value['name'] == null) {

                array_splice($menu_category,$key);

            }

        } */

        if(!empty($menu_category) || $menu_category != null) {


            $menu_category = json_encode($menu_category);

            if($restaurant_category != null || !empty($restaurant_category)) {

                $restaurant_category = json_decode($restaurant_category,true);

                $test = end($restaurant_category);

                //dd($test['id']);

                $menu_category = json_decode($menu_category,true);

                $menu_end = end($menu_category);

                foreach( $menu_category as $key => $value) {

                    if($test != null || $test != 0 && $menu_end) {

                        $id_num = $test['id'] + ( $key + 1 );
                        $menu_category[$key]['id'] = $id_num;

                    }

                    else {

                        $menu_category[$key]['id'] = $key;

                    }

                }

                $restaurant_category = json_encode($restaurant_category);

                $menu_category = json_encode($menu_category);

                //dd($restaurant_category,$menu_category);

                $curr_cat = json_decode($restaurant_category);
                $new_cat =json_decode($menu_category);
                $end_cat = array_merge($curr_cat, $new_cat);

                $restaurant->food_categories = json_encode($end_cat);

            }

            else {

                $menu_category = json_decode($menu_category, true);

                foreach( $menu_category as $key => $value) {
    
                    $menu_category[$key]['id'] = $key;
    
                }

                $menu_category = json_encode($menu_category);

                $restaurant->food_categories = $menu_category;

            }

        }

        else { return back(); }

        $restaurant->save();

        return redirect(route('menu'));

    }

    public function sort(Request $request, Restaurants $restaurants) {

        if($request->ajax())
        {

        $user = $request->user();

        $vendor_id = Vendor::select('id')->where('user_id', $user->id)->value('id');
        $restaurant_id = Restaurants::select('id')->where('vendor_id', $vendor_id)->value('id');

        $menu_category = Restaurants::select('food_categories')->where('id', $restaurant_id )->value('food_categories');

        $menu_category = json_decode($menu_category,true);

        $order = $request->orders;
        $ids = $request->id;

        $order = array_map('intval', $order );
        $order = array_keys($order);

        $integerIDs = array_map('intval',  $ids );
        //$integerIDs = array_keys($integerIDs);

        //Try usort function
        /*usort($menu_category, function($a, $b) { //Sort the array using a user defined function
            return $a->order < $b->order ? -1 : 1; //Compare the scores
        }); 

        $menu_category = json_encode($menu_category);
        $menu_category = json_decode($menu_category, true); */

        foreach( $menu_category as $key => $value ) {

            $order_position = array_shift($order);
            $id_position = array_shift($integerIDs);

            $menu_category[$id_position]['order'] = $order_position;

        }

        $menusort = $restaurants::find($restaurant_id);

        $menu_category = json_encode($menu_category);

        $menusort->food_categories = $menu_category;

        $menusort->save();

        return 'success';

        }

    }

}
