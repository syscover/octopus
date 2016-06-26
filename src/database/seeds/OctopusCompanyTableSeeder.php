<?php

use Illuminate\Database\Seeder;
use Syscover\Octopus\Models\Company;

class OctopusCompanyTableSeeder extends Seeder {

    public function run()
    {
        Company::insert([
            [
                'id_074'                    => 1,
                'company_name_074'          => 'Perfumes y Diseño Comercial S.L.',
                'tin_074'                   => 'B/81-061616',
                'country_id_074'            => 'ES',
                'territorial_area_1_id_074' => 'ES-MD',
                'territorial_area_2_id_074' => 'ES-M',
                'territorial_area_3_id_074' => null,
                'cp_074'                    => '28034',
                'locality_074'              => 'Madrid',
                'address_074'               => 'Calle de la Isla de Java, 33',
                'contact_074'               => null,
                'phone_074'                 => '916 58 88 20',
                'email_074'                 => null,
                'web_074'                   => 'www.pyd.es',
            ],
            [
                'id_074'                    => 2,
                'company_name_074'          => 'Tous Perfumes, S.A.',
                'tin_074'                   => 'A/82-722042',
                'country_id_074'            => 'ES',
                'territorial_area_1_id_074' => 'ES-MD',
                'territorial_area_2_id_074' => 'ES-M',
                'territorial_area_3_id_074' => null,
                'cp_074'                    => '28034',
                'locality_074'              => 'Madrid',
                'address_074'               => 'Calle de la Isla de Java, 33',
                'contact_074'               => null,
                'phone_074'                 => '916 58 88 20',
                'email_074'                 => null,
                'web_074'                   => 'www.pyd.es',
            ]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="OctopusCompanyTableSeeder"
 */