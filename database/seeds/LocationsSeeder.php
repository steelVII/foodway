<?php

use App\Locations;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $states = ['Johor','Kelantan','Kedah','Kuala Lumpur','Melacca','Negeri Sembilan','Pahang','Penang','Perak','Perlis','Sabah','Sarawak','Selangor','Terengganu'];
        
        foreach( $states as $state) {

            Locations::create([

                'state' => $state,

            ]);

        }

    }
}
