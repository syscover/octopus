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

class Companies extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusCompany';
    protected $folder       = 'companies';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_074', 'company_name_074', 'email_074', 'phone_074', 'contact_074'];
    protected $nameM        = 'name_company_074';
    protected $model        = '\Syscover\Octopus\Models\Company';
    protected $icon         = 'icon-building';
    protected $objectTrans  = 'company';

    public function storeCustomRecord($request, $parameters)
    {
        Company::create([
            'company_name_074'          => $request->input('companyName'),
            'tin_074'                   => $request->input('tin'),
            'country_074'               => $request->input('country'),
            'territorial_area_1_074'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_074'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_074'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_074'                    => $request->input('cp'),
            'locality_074'              => $request->input('locality'),
            'address_074'               => $request->input('address'),
            'contact_074'               => $request->input('contact'),
            'phone_074'                 => $request->input('phone'),
            'email_074'                 => $request->input('email'),
            'web_074'                   => $request->input('web')
        ]);
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Company::where('id_074', $parameters['id'])->update([
            'company_name_074'          => $request->input('companyName'),
            'tin_074'                   => $request->input('tin'),
            'country_074'               => $request->input('country'),
            'territorial_area_1_074'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_074'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_074'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_074'                    => $request->input('cp'),
            'locality_074'              => $request->input('locality'),
            'address_074'               => $request->input('address'),
            'contact_074'               => $request->input('contact'),
            'phone_074'                 => $request->input('phone'),
            'email_074'                 => $request->input('email'),
            'web_074'                   => $request->input('web')
        ]);
    }
}