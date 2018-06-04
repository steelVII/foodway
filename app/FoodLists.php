<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodLists extends Model
{
    protected $fillable = [

        'food_name','description','price','food_image','restaurant_id','restaurant_name','food_categories'

    ];

    public function restaurant() {

        return $this->belongsTo(Restaurants::class,'restaurant_id');

    }
}
