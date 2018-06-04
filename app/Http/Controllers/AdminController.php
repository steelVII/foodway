<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index() {

        $all_orders = Orders::all();

        $all_orders_count = $all_orders->count();

        $order_total = 0;

        foreach($all_orders as $order) {

            $total = $order->total;
            $total = number_format((float)$total, 2, '.', '');
            $order_total += $total;

        }

        $pending_orders = Orders::where('order_status','Pending')->count();
        $delivered_orders = Orders::where('order_status','Delivered')->count();
        $order_total = number_format((float)$order_total, 2, '.', '');;

        return view('backend.backend', compact('all_orders_count','pending_orders','delivered_orders','order_total'));

    }

}
