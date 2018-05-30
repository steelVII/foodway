<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = [

        'restaurant_name','vendor_id','vendor_name','email'

    ];

    public function menu() {

        return $this->hasMany(FoodLists::class,'restaurant_id');

    }

    public function menu_category() {

        return $this->hasMany(FoodCategories::class,'restaurant_id');

    }

    public function vendor() {

        return $this->belongsTo(Vendor::class,'vendor_id');

    }

}
