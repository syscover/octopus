<?php namespace Syscover\Octopus\Controllers;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Support\Facades\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Shop;

class Shops extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusShop';
    protected $folder       = 'shops';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_076', 'company_name_075', 'name_076', ['data' => 'email_076', 'type' => 'email'], 'phone_076', 'contact_076'];
    protected $nameM        = 'company_name_076';
    protected $model        = '\Syscover\Octopus\Models\Shop';
    protected $icon         = 'icomoon-icon-office';
    protected $objectTrans  = 'shop';

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        // init record on tap 2
        $actionUrlParameters['tab'] = 2;

        return $actionUrlParameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        Shop::create([
            'customer_076'              => Request::input('customerid'),
            'name_076'                  => Request::input('name'),
            'tin_076'                   => Request::input('tin'),
            'country_076'               => Request::input('country'),
            'territorial_area_1_076'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_076'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_076'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_076'                    => Request::input('cp'),
            'locality_076'              => Request::input('locality'),
            'address_076'               => Request::input('address'),
            'contact_076'               => Request::input('contact'),
            'phone_076'                 => Request::input('phone'),
            'email_076'                 => Request::input('email'),
            'web_076'                   => Request::input('web')
        ]);
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Shop::where('id_076', $parameters['id'])->update([
            'customer_076'              => Request::input('customerid'),
            'name_076'                  => Request::input('name'),
            'tin_076'                   => Request::input('tin'),
            'country_076'               => Request::input('country'),
            'territorial_area_1_076'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_076'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_076'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_076'                    => Request::input('cp'),
            'locality_076'              => Request::input('locality'),
            'address_076'               => Request::input('address'),
            'contact_076'               => Request::input('contact'),
            'phone_076'                 => Request::input('phone'),
            'email_076'                 => Request::input('email'),
            'web_076'                   => Request::input('web')
        ]);
    }
}