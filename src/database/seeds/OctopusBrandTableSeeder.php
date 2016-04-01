<?php

use Illuminate\Database\Seeder;
use Syscover\Octopus\Models\Brand;

class OctopusBrandTableSeeder extends Seeder {

    public function run()
    {
        Brand::insert([
            ['id_071' => 1, 'name_071' => 'Halloween'],
            ['id_071' => 2, 'name_071' => 'Roberto Verino'],
            ['id_071' => 3, 'name_071' => 'Tous'],
            ['id_071' => 4, 'name_071' => 'Annick Goutal'],
            ['id_071' => 5, 'name_071' => 'Salvatore Ferragamo'],
            ['id_071' => 6, 'name_071' => 'Jesús del Pozo'],
            ['id_071' => 7, 'name_071' => 'Desigual'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusBrandTableSeeder"
 */