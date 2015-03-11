<?php

use Illuminate\Database\Seeder;
use Syscover\Octopus\Models\Product;

class ProductOctopusTableSeeder extends Seeder {

    public function run()
    {
        Product::insert([
            ['id_072' => 37,'brand_072' => 5,'name_072' => 'Logo Salvatore Ferragamo'],
            ['id_072' => 47,'brand_072' => 1,'name_072' => 'HWN blue drop'],
            ['id_072' => 7,'brand_072' => 1,'name_072' => 'HALLOWEEN'],
            ['id_072' => 39,'brand_072' => 3,'name_072' => 'TOUS Kids'],
            ['id_072' => 38,'brand_072' => 5,'name_072' => 'Signorina EdP'],
            ['id_072' => 40,'brand_072' => 3,'name_072' => 'TOUS EdT + MAN (mixta)'],
            ['id_072' => 15,'brand_072' => 3,'name_072' => 'Baby TOUS(Sept-2014)'],
            ['id_072' => 17,'brand_072' => 3,'name_072' => 'TOUS Touch(Sept-2014)'],
            ['id_072' => 50,'brand_072' => 5,'name_072' => 'ACQUA ESSENZIALE'],
            ['id_072' => 36,'brand_072' => 4,'name_072' => 'Logo ANNICK GOUTAL'],
            ['id_072' => 21,'brand_072' => 2,'name_072' => 'GOLD DIVA'],
            ['id_072' => 23,'brand_072' => 3,'name_072' => 'TOUS H2O'],
            ['id_072' => 24,'brand_072' => 3,'name_072' => 'TOUS MAN Sport'],
            ['id_072' => 26,'brand_072' => 2,'name_072' => 'GOLD Bouquet'],
            ['id_072' => 27,'brand_072' => 3,'name_072' => 'TOUS l´Eau 3fr.'],
            ['id_072' => 28,'brand_072' => 3,'name_072' => 'Logo TOUS'],
            ['id_072' => 29,'brand_072' => 1,'name_072' => 'Logo  HWN - JP'],
            ['id_072' => 30,'brand_072' => 2,'name_072' => 'Logo ROBERTO VERINO'],
            ['id_072' => 31,'brand_072' => 2,'name_072' => 'RV PURE Man'],
            ['id_072' => 32,'brand_072' => 1,'name_072' => 'HWN FEVER'],
            ['id_072' => 33,'brand_072' => 3,'name_072' => 'TOUS Sensual Touch'],
            ['id_072' => 34,'brand_072' => 4,'name_072' => 'Nuit Etoilée'],
            ['id_072' => 35,'brand_072' => 1,'name_072' => 'HWN MAN'],
            ['id_072' => 41,'brand_072' => 3,'name_072' => 'TOUS MAN INTENSE'],
            ['id_072' => 42,'brand_072' => 3,'name_072' => 'TOUS EdT'],
            ['id_072' => 43,'brand_072' => 3,'name_072' => 'TOUS MAN'],
            ['id_072' => 44,'brand_072' => 3,'name_072' => 'ROSA (frasco)'],
            ['id_072' => 45,'brand_072' => 3,'name_072' => 'ROSA (Sra.)'],
            ['id_072' => 46,'brand_072' => 2,'name_072' => 'RV PURE Woman'],
            ['id_072' => 48,'brand_072' => 5,'name_072' => 'Signorina EdT'],
            ['id_072' => 49,'brand_072' => 1,'name_072' => 'HWN Fleur'],
            ['id_072' => 51,'brand_072' => 5,'name_072' => 'Signorina Eleganza'],
            ['id_072' => 52,'brand_072' => 5,'name_072' => 'Signorina Acqua Essenziale'],
            ['id_072' => 53,'brand_072' => 3,'name_072' => 'ROSA Eau Légère'],
            ['id_072' => 54,'brand_072' => 3,'name_072' => 'TOUS Love'],
            ['id_072' => 55,'brand_072' => 1,'name_072' => 'HWN MAN Rock On'],
            ['id_072' => 56,'brand_072' => 4,'name_072' => 'EAU D´HADRIEN -Institucional-'],
            ['id_072' => 57,'brand_072' => 6,'name_072' => 'Arabian Nights -Collection-']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ProductOctopusTableSeeder"
 */