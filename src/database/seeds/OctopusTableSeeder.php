<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OctopusTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(PulsarActionTableSeeder::class);
        $this->call(OctopusFamilyTableSeeder::class);
        $this->call(OctopusBrandTableSeeder::class);
        $this->call(OctopusProductTableSeeder::class);
        $this->call(OctopusResourceTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusTableSeeder"
 */