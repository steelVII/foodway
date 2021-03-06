<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(FoodCategorySeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DishSeeder::class);
    }
}
