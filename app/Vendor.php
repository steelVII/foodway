<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    protected $fillable = [

        "vendor_name","user_id"

    ];

    //One Vendor has One Restaurant

    public function owns() {

        return $this->hasOne(Restaurant::Class,'vendor_id');

    }

}
