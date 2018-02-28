<?php

use App\Vendor;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Vendor::create([

            'vendor_name' => 'Foodway',
            'user_id'=> 2,

        ]);

    }
}
