<?php

use Illuminate\Database\Seeder;
use Syscover\Octopus\Models\Laboratory;

class OctopusLaboratoryTableSeeder extends Seeder {

    public function run()
    {
        Laboratory::insert([
            [
                'id_073'                    => 1,
                'company_name_073'          => 'NORTECOLOR',
                'tin_073'                   => 'A78491966',
                'country_073'               => 'ES',
                'territorial_area_1_073'    => 'ES-MD',
                'territorial_area_2_073'    => 'ES-M',
                'territorial_area_3_073'    => null,
                'cp_073'                    => '28037',
                'locality_073'              => 'Madrid',
                'address_073'               => 'Julián Camarillo 23',
                'contact_073'               => 'Hector y Paco',
                'phone_073'                 => '91 304 21 21',
                'email_073'                 => 'administracion@nortecolor.es',
                'web_073'                   => 'nortecolor.es',
                'favorite_073'              => true
            ]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusLaboratoryTableSeeder"
 */