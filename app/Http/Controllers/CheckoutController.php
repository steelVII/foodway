<?php

namespace App\Http\Controllers;

use Auth;

use App\User;
use App\Restaurants;
use App\Orders;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index(Request $request) {

        $id = session('id');
        $items = session('items');
        $subtotal = number_format((float)session('subtotal'), 2, '.', '');
        //$gst = number_format((float)session('gst'), 2, '.', ''); Remove GST
        $total = number_format((float)session('total'), 2, '.', '');

        $res_name = Restaurants::select('restaurant_name')->where('id', $id)->value('restaurant_name');

        if(Auth::check()) {

            $user = $request->user();
            return view('homepage.checkout', compact('user','id','res_name','items','subtotal','total'));

        }

        else{

            return view('homepage.checkout', compact('id','res_name','items','subtotal','total'));

        }

    }

    public function checkout(Request $request) {

        if($request) {

            $id = $request->id;
            $items = $request->items;
            $subtotal = $request->subtotal;
            //$gst = $request->gst;
            $total = $request->total; 
            
            session(['id' => $id ]);
            session(['items' => $items ]);
            session(['subtotal' => $subtotal]);
            //session(['gst' => $gst]);
            session(['total' => $total]);

            return;

        }

    }

    public function checkout_process(Request $request, $res_name, $res_id) {

        $user = $request->user();

        if(Auth::check()) {

            $user_id = $user->id;

        }

        else {

            $user_id = "";

        }
        
        $date = date("D M d, Y G:i");
        $ref_id = substr(md5(uniqid($user_id . $date, true)), 0, 6);

        $order = Orders::create([

                    'order_id' => $ref_id,
                    'user_id' => $user_id,
                    'order_status' => "Pending",
                    'delivery_time' => request('delivery_time'),
                    'restaurant_id' => $res_id,
                    'restaurant_name' => $res_name,
                    'dish_items' => request('order_item'),
                    'total' => request('order_total'),
                    'payment_method' => request('payment_method'),
                    'shipping_name' => request('shipping_name'),
                    'shipping_phone_number' => request('shipping_phone_number'),
                    'shipping_email' => request('shipping_email'),
                    'shipping_address' => request('shipping_address'),
                    'billing_name' => request('billing_name'),
                    'billing_phone_number' => request('billing_phone_number'),
                    'billing_email' => request('billing_email'),
                    'billing_address' => request('billing_address')

                ]);

        return redirect(route('home'))->with('clear_status', "1");

    }

}
