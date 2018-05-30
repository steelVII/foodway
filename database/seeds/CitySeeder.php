<?php

use App\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        City::create([

            'city_name' => 'Setia Alam',
            'state' => 'Selangor',
            'state_id' => 13

        ]);

        City::create([

            'city_name' => 'Bidor',
            'state' => 'Perak',
            'state_id' => 9

        ]);

    }
}
