<?php

use Illuminate\Database\Seeder;
use App\FoodCategories;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cat = [

            'Beef',
            'Chicken',
            'Lamb',
            'Noodle',
            'Rice',
            'Seafood',

        ];

        //$faker = Faker\Factory::create();
        
        for($i = 1; $i <= count($cat); $i++) {

        FoodCategories::create([

            'category_name' => $cat[$i - 1]

        ]);

        }

    }
}
