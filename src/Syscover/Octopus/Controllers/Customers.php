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

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Customer;

class Customers extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusCustomer';
    protected $folder       = 'customers';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_075', 'code_075', 'company_name_075', ['data' => 'email_075', 'type' => 'email'], 'phone_075', 'contact_075'];
    protected $nameM        = 'company_name_075';
    protected $model        = Customer::class;
    protected $icon         = 'icomoon-icon-users';
    protected $objectTrans  = 'customer';

    public function storeCustomRecord($parameters)
    {
        Customer::create([
            'code_075'                  => $this->request->input('code'),
            'company_name_075'          => $this->request->input('companyName'),
            'tin_075'                   => $this->request->input('tin'),
            'country_075'               => $this->request->input('country'),
            'territorial_area_1_075'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_075'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_075'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_075'                    => $this->request->input('cp'),
            'locality_075'              => $this->request->input('locality'),
            'address_075'               => $this->request->input('address'),
            'contact_075'               => $this->request->input('contact'),
            'phone_075'                 => $this->request->input('phone'),
            'email_075'                 => $this->request->input('email'),
            'web_075'                   => $this->request->input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Customer::where('id_075', $parameters['id'])->update([
            'code_075'                  => $this->request->input('code'),
            'company_name_075'          => $this->request->input('companyName'),
            'tin_075'                   => $this->request->input('tin'),
            'country_075'               => $this->request->input('country'),
            'territorial_area_1_075'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_075'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_075'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_075'                    => $this->request->input('cp'),
            'locality_075'              => $this->request->input('locality'),
            'address_075'               => $this->request->input('address'),
            'contact_075'               => $this->request->input('contact'),
            'phone_075'                 => $this->request->input('phone'),
            'email_075'                 => $this->request->input('email'),
            'web_075'                   => $this->request->input('web')
        ]);
    }
}