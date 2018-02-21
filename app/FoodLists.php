<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodLists extends Model
{
    protected $fillable = [

        'food_name','restaurant_id','restaurant_name','food_categories'

    ];
}
