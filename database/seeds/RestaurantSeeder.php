<?php

use App\Restaurants;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Restaurants::create([

            'restaurant_name' => 'Foodway',
            'vendor_id' => '1',
            'vendor_name' => 'Foodway',
            'food_categories' => 'Beef,Chicken,Seafood',
            'email' => 'foodway2@foodway.com',
            'phone_num' => '01234567890',
            'restaurant_image' => 'food1.jpeg',

        ]);

    }
}
