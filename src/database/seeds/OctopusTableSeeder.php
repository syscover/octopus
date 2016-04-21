<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OctopusTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(OctopusFamilyTableSeeder::class);
        $this->call(OctopusBrandTableSeeder::class);
        $this->call(OctopusProductTableSeeder::class);
        $this->call(OctopusLaboratoryTableSeeder::class);
        $this->call(OctopusCompanyTableSeeder::class);
        $this->call(OctopusCustomerTableSeeder::class);
        $this->call(OctopusShopTableSeeder::class);
        $this->call(OctopusAddressTableSeeder::class);
        $this->call(OctopusRequestTableSeeder::class);
        $this->call(OctopusOrderTableSeeder::class);
        $this->call(OctopusStockTableSeeder::class);
        $this->call(OctopusResourceTableSeeder::class);
        $this->call(OctopusPackageTableSeeder::class);

        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusTableSeeder"
 */