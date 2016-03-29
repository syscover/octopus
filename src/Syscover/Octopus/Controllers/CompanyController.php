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
use Syscover\Octopus\Models\Company;

class CompanyController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusCompany';
    protected $folder       = 'companies';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_074', 'company_name_074', 'email_074', 'phone_074', 'contact_074'];
    protected $nameM        = 'name_company_074';
    protected $model        = Company::class;
    protected $icon         = 'icon-building';
    protected $objectTrans  = 'company';

    public function storeCustomRecord($parameters)
    {
        Company::create([
            'company_name_074'          => $this->request->input('companyName'),
            'tin_074'                   => $this->request->input('tin'),
            'country_074'               => $this->request->input('country'),
            'territorial_area_1_074'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_074'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_074'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_074'                    => $this->request->input('cp'),
            'locality_074'              => $this->request->input('locality'),
            'address_074'               => $this->request->input('address'),
            'contact_074'               => $this->request->input('contact'),
            'phone_074'                 => $this->request->input('phone'),
            'email_074'                 => $this->request->input('email'),
            'web_074'                   => $this->request->input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Company::where('id_074', $parameters['id'])->update([
            'company_name_074'          => $this->request->input('companyName'),
            'tin_074'                   => $this->request->input('tin'),
            'country_074'               => $this->request->input('country'),
            'territorial_area_1_074'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_074'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_074'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_074'                    => $this->request->input('cp'),
            'locality_074'              => $this->request->input('locality'),
            'address_074'               => $this->request->input('address'),
            'contact_074'               => $this->request->input('contact'),
            'phone_074'                 => $this->request->input('phone'),
            'email_074'                 => $this->request->input('email'),
            'web_074'                   => $this->request->input('web')
        ]);
    }
}