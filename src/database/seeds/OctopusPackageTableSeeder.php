<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Package;

class OctopusPackageTableSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id_012' => '8', 'name_012' => 'Octopus Package', 'folder_012' => 'octopus', 'sorting_012' => 8, 'active_012' => '0']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusPackageTableSeeder"
 */