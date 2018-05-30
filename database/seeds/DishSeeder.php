<?php

use App\FoodLists;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        FoodLists::create([

            'food_name' => 'Grilled Chicken',
            'description' => 'Grilled Chicken',
            'is_available' => 1,
            'price' => 12.50,
            'food_image' => 'food3.jpeg',
            'restaurant_id' => 1,
            'restaurant_name' => 'Foodway',
            'food_categories' => 'Chicken'

        ]);

        FoodLists::create([

            'food_name' => 'Steamed Chicken',
            'description' => 'Steamed Chicken',
            'is_available' => 0,
            'price' => 14.50,
            'food_image' => 'food2.jpeg',
            'restaurant_id' => 1,
            'restaurant_name' => 'Foodway',
            'food_categories' => 'Chicken'

        ]);

    }
}
