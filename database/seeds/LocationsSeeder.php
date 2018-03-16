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

        Locations::create([

            'state' => 'Selangor',
            'city' => '{"city":["Klang","Setia Alam","Shah Alam","Subang","Puchong"]}'

        ]);

        Locations::create([

            'state' => 'Perak',
            'city' => '{"city":["Ipoh","Bidor"]}'

        ]);
    }
}
