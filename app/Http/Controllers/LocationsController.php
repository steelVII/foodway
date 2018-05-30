<?php

namespace App\Http\Controllers;

use App\Locations;
use App\City;
use Illuminate\Http\Request;

class LocationsController extends Controller
{

    public function index() {

        $locations = Locations::orderBy('state','ASC')->get();

        return view('backend.Locations.locations', compact('locations'));

    }

    public function add_city(Locations $location, $state) {

        $state_id = Locations::select('id')->where('state', $state)->value('id');

        $state_ope = Locations::find($state_id);

        City::create([

            'city_name' => request('city'),
            'state_id' => $state_id,
            'state' => $state

        ]);
        
        return back();

    }
    
    public function getCities(Request $request, Locations $locations) {

        if($request->ajax()) {

            $state = $request->state;

            $state_id = Locations::select('id')->where('state', $state)->value('id');

            $state_ope = Locations::find($state_id);
    
            $cities = $state_ope->cities()->where('state',$state)->get()->toJson();

        }

        return $cities;

    }

    public function edit($state) {

        $state = $state;

        $state_id = Locations::select('id')->where('state', $state)->value('id');

        $state_ope = Locations::find($state_id);

        $cities = $state_ope->cities()->where('state',$state)->get();

        return view('backend.Locations.edit_locations', compact('state','cities'));        

    }

}
