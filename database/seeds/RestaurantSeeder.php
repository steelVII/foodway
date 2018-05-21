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
            'food_categories' => '[{"name":"Chicken","order":1,"id":0},{"name":"Beef","order":0,"id":1},{"name":"Lamb","order":2,"id":2}]',
            'email' => 'foodway2@foodway.com',
            'phone_num' => '01234567890',
            'state' => 'Selangor',
            'city' => 'Setia Alam',
            'postcode' => 42000,
            'address' => '50, Jalan Setia',
            'opening_hours' => '10:00',
            'closing_hours' => '22:00',
            'restaurant_logo' => 'wendys.jpg',
            'restaurant_image' => 'food1.jpeg',

        ]);

    }
}
