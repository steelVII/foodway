<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [

        'order_id','user_id','order_status','delivery_time','restaurant_id','restaurant_name','dish_items','total','payment_method','shipping_name','shipping_phone_number',
        'shipping_email','shipping_address','billing_name','billing_phone_number','billing_email','billing_address'

    ];

    public function restaurant_order() {

        return $this->belongsTo(Restaurants::class,'restaurant_id');

    }
}
