<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Company;

/**
 * Class CompanyController
 * @package Syscover\Octopus\Controllers
 */

class CompanyController extends Controller
{
    protected $routeSuffix  = 'octopusCompany';
    protected $folder       = 'company';
    protected $package      = 'octopus';
    protected $indexColumns = ['id_074', 'company_name_074', 'email_074', 'phone_074', 'contact_074'];
    protected $nameM        = 'name_company_074';
    protected $model        = Company::class;
    protected $icon         = 'fa fa-building';
    protected $objectTrans  = 'company';

    public function storeCustomRecord($parameters)
    {
        Company::create([
            'company_name_074'          => $this->request->input('companyName'),
            'tin_074'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_id_074'            => $this->request->input('country'),
            'territorial_area_1_id_074' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_074' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_074' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_074'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_074'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_074'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_074'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_074'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_074'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_074'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Company::where('id_074', $parameters['id'])->update([
            'company_name_074'          => $this->request->input('companyName'),
            'tin_074'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_id_074'            => $this->request->input('country'),
            'territorial_area_1_id_074' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_074' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_074' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_074'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_074'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_074'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_074'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_074'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_074'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_074'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);
    }
}