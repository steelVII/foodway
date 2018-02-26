<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = [

        'restaurant_name','food_categories','email','phone_num','restaurant_image'

    ];

    public function menu() {

        return $this->hasMany(FoodLists::class,'restaurant_id');

    }
}
