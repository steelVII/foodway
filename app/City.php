<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [

        'city_name','state_id','state'

    ];

    public function city() {

        return $this->belongsTo(Locations::class,'state_id');

    }

}
