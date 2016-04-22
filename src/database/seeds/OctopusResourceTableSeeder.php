<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class OctopusResourceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'octopus',                     'name_007' => 'Octopus Package',            'package_007' => '8'],
            ['id_007' => 'octopus-preference',          'name_007' => 'Preferences',                'package_007' => '8'],
            ['id_007' => 'octopus-family',              'name_007' => 'Family',                     'package_007' => '8'],
            ['id_007' => 'octopus-brand',               'name_007' => 'Brand',                      'package_007' => '8'],
            ['id_007' => 'octopus-product',             'name_007' => 'Product',                    'package_007' => '8'],
            ['id_007' => 'octopus-laboratory',          'name_007' => 'Laboratory',                 'package_007' => '8'],
            ['id_007' => 'octopus-company',             'name_007' => 'Company',                    'package_007' => '8'],
            ['id_007' => 'octopus-customer',            'name_007' => 'Customer',                   'package_007' => '8'],
            ['id_007' => 'octopus-shop',                'name_007' => 'Point of sale',              'package_007' => '8'],
            ['id_007' => 'octopus-address',             'name_007' => 'Address from point of sale', 'package_007' => '8'],
            ['id_007' => 'octopus-request',             'name_007' => 'Request',                    'package_007' => '8'],
            ['id_007' => 'octopus-supervisor-request',  'name_007' => 'Supervisor Request',         'package_007' => '8'],
            ['id_007' => 'octopus-order',               'name_007' => 'Order',                      'package_007' => '8'],
            ['id_007' => 'octopus-laboratory-order',    'name_007' => 'Laboratory order',           'package_007' => '8'],
            ['id_007' => 'octopus-stock',               'name_007' => 'Stock',                      'package_007' => '8'],
            ['id_007' => 'octopus-supervisor-stock',    'name_007' => 'Supervisor Stock',           'package_007' => '8'],
            ['id_007' => 'octopus-delegate-stock',      'name_007' => 'Delegate Stock',             'package_007' => '8'],
            ['id_007' => 'octopus-master-tables',       'name_007' => 'Master tables',              'package_007' => '8'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusResourceTableSeeder"
 */