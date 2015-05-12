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
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Octopus\Models\Shop;

class Shops extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusShop';
    protected $folder       = 'shops';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_076', 'name_076', 'email_076', 'phone_076', 'contact_076'];
    protected $nameM        = 'company_name_076';
    protected $model        = '\Syscover\Octopus\Models\Shop';
    protected $icon         = 'icomoon-icon-office';
    protected $objectTrans  = 'shop';

    public function storeCustomRecord()
    {
        Shop::create([
            'customer_076'              => Request::input('customerid'),
            'name_076'                  => Request::input('name'),
            'tin_076'                   => Request::input('tin'),
            'country_076'               => Request::input('country'),
            'territorial_area_1_076'    => !Request::has('territorialArea1') || Request::input('territorialArea1') == 'null'? null : Request::input('territorialArea1'),
            'territorial_area_2_076'    => !Request::has('territorialArea2') || Request::input('territorialArea2') == 'null'? null : Request::input('territorialArea2'),
            'territorial_area_3_076'    => !Request::has('territorialArea3') || Request::input('territorialArea3') == 'null'? null : Request::input('territorialArea3'),
            'cp_076'                    => Request::input('cp'),
            'locality_076'              => Request::input('locality'),
            'address_076'               => Request::input('address'),
            'contact_076'               => Request::input('contact'),
            'phone_076'                 => Request::input('phone'),
            'email_076'                 => Request::input('email'),
            'web_076'                   => Request::input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Shop::where('id_076', $parameters['id'])->update([
            'customer_076'              => Request::input('customerid'),
            'name_076'                  => Request::input('name'),
            'tin_076'                   => Request::input('tin'),
            'country_076'               => Request::input('country'),
            'territorial_area_1_076'    => !Request::has('territorialArea1') || Request::input('territorialArea1') == 'null'? null : Request::input('territorialArea1'),
            'territorial_area_2_076'    => !Request::has('territorialArea2') || Request::input('territorialArea2') == 'null'? null : Request::input('territorialArea2'),
            'territorial_area_3_076'    => !Request::has('territorialArea3') || Request::input('territorialArea3') == 'null'? null : Request::input('territorialArea3'),
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