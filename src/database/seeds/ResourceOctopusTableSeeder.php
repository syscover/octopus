<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class ResourceOctopusTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'octopus','name_007' => 'Octopus Package','package_007' => '8'],
            ['id_007' => 'octopus-family','name_007' => 'Family','package_007' => '8'],
            ['id_007' => 'octopus-brand','name_007' => 'Brand','package_007' => '8'],
            ['id_007' => 'octopus-product','name_007' => 'Product','package_007' => '8'],
            ['id_007' => 'octopus-laboratory','name_007' => 'Laboratory','package_007' => '8'],
            ['id_007' => 'octopus-company','name_007' => 'Company','package_007' => '8'],
            ['id_007' => 'octopus-customer','name_007' => 'Customer','package_007' => '8'],
            ['id_007' => 'octopus-shop','name_007' => 'Point of sale','package_007' => '8'],
            ['id_007' => 'octopus-request','name_007' => 'Request','package_007' => '8'],
            ['id_007' => 'octopus-order','name_007' => 'Order','package_007' => '8'],
            ['id_007' => 'octopus-committed','name_007' => 'Committed','package_007' => '8']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ResourceOctopusTableSeeder"
 */