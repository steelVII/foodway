<?php

namespace App\Http\Controllers;

use App\Restaurants;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index() {

        $id = session('id');
        $items = session('items');
        $subtotal = session('subtotal');
        $gst = session('gst');
        $total = session('total');

        $res_name = Restaurants::select('restaurant_name')->where('id', $id)->value('restaurant_name');

        return view('homepage.checkout', compact('res_name','items','subtotal','gst','total'));

    }

    public function checkout(Request $request) {

        if($request) {

            $id = $request->id;
            $items = $request->items;
            $subtotal = $request->subtotal;
            $gst = $request->gst;
            $total = $request->total; 
            
            session(['id' => $id ]);
            session(['items' => $items ]);
            session(['subtotal' => $subtotal]);
            session(['gst' => $gst]);
            session(['total' => $total]);

            return;

        }

    }

}
