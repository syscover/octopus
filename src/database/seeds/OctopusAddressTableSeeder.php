<?php

use Illuminate\Database\Seeder;
use Syscover\Octopus\Models\Address;

class OctopusAddressTableSeeder extends Seeder {

    public function run()
    {
        Address::insert([

        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusAddressTableSeeder"
 */