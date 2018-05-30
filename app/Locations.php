<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{

    public function cities() {

        return $this->hasMany(City::class,'state_id');

    }

}
