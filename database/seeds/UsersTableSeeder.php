<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'acc_type' => 1,
            'name' => 'foodwayadmin',
            'email' => 'foodway@foodway.com',
            'password' => bcrypt('foodway123')
        ]);

        User::create([
            'acc_type' => 3,
            'name' => 'Foodway',
            'email' => 'foodway2@foodway.com',
            'password' => bcrypt('foodway123')
        ]);

        User::create([
            'acc_type' => 0,
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('foodway123')
        ]);
        
    }
}
