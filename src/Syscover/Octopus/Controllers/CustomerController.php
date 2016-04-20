<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Customer;

class CustomerController extends Controller
{
    protected $routeSuffix  = 'octopusCustomer';
    protected $folder       = 'customer';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_075', 'code_075', 'company_name_075', ['data' => 'email_075', 'type' => 'email'], 'phone_075', 'contact_075'];
    protected $nameM        = 'company_name_075';
    protected $model        = Customer::class;
    protected $icon         = 'icomoon-icon-users';
    protected $objectTrans  = 'customer';

    public function customIndex($parameters)
    {
        if(isset($parameters['modal']) && $parameters['modal'] == 1)
            $this->viewParameters['deleteSelectButton'] = false;

        return $parameters;
    }

    public function customJsonData($parameters)
    {
        if($parameters['modal'] == 1)
        {
            $this->viewParameters['checkBoxColumn'] = false;
            $this->viewParameters['relatedButton']  = true;
        }
    }

    public function storeCustomRecord($parameters)
    {
        Customer::create([
            'code_075'                  => $this->request->input('code'),
            'company_name_075'          => $this->request->input('companyName'),
            'tin_075'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_075'               => $this->request->input('country'),
            'territorial_area_1_075'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_075'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_075'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_075'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_075'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_075'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_075'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_075'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_075'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_075'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Customer::where('id_075', $parameters['id'])->update([
            'code_075'                  => $this->request->has('code')? $this->request->input('code') : null,
            'company_name_075'          => $this->request->input('companyName'),
            'tin_075'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_075'               => $this->request->input('country'),
            'territorial_area_1_075'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_075'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_075'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_075'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_075'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_075'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_075'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_075'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_075'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_075'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);
    }
}