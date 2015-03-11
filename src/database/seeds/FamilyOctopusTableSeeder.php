<?php

use Illuminate\Database\Seeder;
use Syscover\Octopus\Models\Family;

class FamilyOctopusTableSeeder extends Seeder {

    public function run()
    {
        Family::insert([
            ['id_070' => 1,'name_070' => 'Duratrans'],
            ['id_070' => 2,'name_070' => 'Foto papel'],
            ['id_070' => 3,'name_070' => 'Vinilo Impreso Adhesivo Opaco'],
            ['id_070' => 4,'name_070' => 'Foto papel sobre imán'],
            ['id_070' => 5,'name_070' => 'Foto papel sobre forex'],
            ['id_070' => 6,'name_070' => 'Foto papel sobre cartón-pluma'],
            ['id_070' => 7,'name_070' => 'Logo Vinilo Adhesivo Recortado'],
            ['id_070' => 8,'name_070' => 'Vinilo Impreso Adhesivo Translúcido'],
            ['id_070' => 9,'name_070' => 'Plotter BackLigth']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="FamilyOctopusTableSeeder"
 */