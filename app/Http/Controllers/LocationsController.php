<?php

namespace App\Http\Controllers;

use App\Locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{

    public function index() {

        $locations = Locations::orderBy('state','ASC')->get();

        return view('backend.Locations.locations', compact('locations'));

    }
    
    public function getCities(Request $request, Locations $locations) {

        if($request->ajax()) {

            $state = $request->state;

            $cities = $locations::select('city')->where('state','=',$state)->value('city');

        }

        return $cities;

    }

    public function edit($state) {

        return view('backend.Locations.edit_locations');        

    }

}
