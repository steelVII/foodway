<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategories extends Model
{
    
    protected $fillable = [

        'category_name','restaurant_id','restaurant_name'

    ];

    public function restaurant_category() {

        return $this->belongsTo(Restaurants::class,'reataurant_id');

    }

}
