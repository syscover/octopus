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
use Syscover\Octopus\Models\Customer;

class Customers extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusCustomer';
    protected $folder       = 'customers';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_075', 'code_075', 'company_name_075', ['data' => 'email_075', 'type' => 'email'], 'phone_075', 'contact_075'];
    protected $nameM        = 'company_name_075';
    protected $model        = '\Syscover\Octopus\Models\Customer';
    protected $icon         = 'icomoon-icon-users';
    protected $objectTrans  = 'customer';

    public function storeCustomRecord()
    {
        dd(Request::has('territorialArea1'));

        Customer::create([
            'code_075'                  => Request::input('code'),
            'company_name_075'          => Request::input('companyName'),
            'tin_075'                   => Request::input('tin'),
            'country_075'               => Request::input('country'),
            'territorial_area_1_075'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_075'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_075'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_075'                    => Request::input('cp'),
            'locality_075'              => Request::input('locality'),
            'address_075'               => Request::input('address'),
            'contact_075'               => Request::input('contact'),
            'phone_075'                 => Request::input('phone'),
            'email_075'                 => Request::input('email'),
            'web_075'                   => Request::input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Customer::where('id_075', $parameters['id'])->update([
            'code_075'                  => Request::input('code'),
            'company_name_075'          => Request::input('companyName'),
            'tin_075'                   => Request::input('tin'),
            'country_075'               => Request::input('country'),
            'territorial_area_1_075'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_075'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_075'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_075'                    => Request::input('cp'),
            'locality_075'              => Request::input('locality'),
            'address_075'               => Request::input('address'),
            'contact_075'               => Request::input('contact'),
            'phone_075'                 => Request::input('phone'),
            'email_075'                 => Request::input('email'),
            'web_075'                   => Request::input('web')
        ]);
    }
}