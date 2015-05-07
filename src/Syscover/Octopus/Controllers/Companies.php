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
use Syscover\Octopus\Models\Company;

class Companies extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusCompany';
    protected $folder       = 'companies';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_074', 'company_name_074', 'email_074', 'phone_074', 'contact_074'];
    protected $nameM        = 'name_company_074';
    protected $model        = '\Syscover\Octopus\Models\Company';
    protected $icon         = 'icon-building';
    protected $objectTrans  = 'company';

    public function storeCustomRecord()
    {
        Company::create([
            'company_name_074'          => Request::input('companyName'),
            'tin_074'                   => Request::input('tin'),
            'country_074'               => Request::input('country'),
            'territorial_area_1_074'    => !Request::has('territorialArea1') || Request::input('territorialArea1') == 'null'? null : Request::input('territorialArea1'),
            'territorial_area_2_074'    => !Request::has('territorialArea2') || Request::input('territorialArea2') == 'null'? null : Request::input('territorialArea2'),
            'territorial_area_3_074'    => !Request::has('territorialArea3') || Request::input('territorialArea3') == 'null'? null : Request::input('territorialArea3'),
            'cp_074'                    => Request::input('cp'),
            'locality_074'              => Request::input('locality'),
            'address_074'               => Request::input('address'),
            'contact_074'               => Request::input('contact'),
            'phone_074'                 => Request::input('phone'),
            'email_074'                 => Request::input('email'),
            'web_074'                   => Request::input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Company::where('id_074', $parameters['id'])->update([
            'company_name_074'          => Request::input('companyName'),
            'tin_074'                   => Request::input('tin'),
            'country_074'               => Request::input('country'),
            'territorial_area_1_074'    => !Request::has('territorialArea1') || Request::input('territorialArea1') == 'null'? null : Request::input('territorialArea1'),
            'territorial_area_2_074'    => !Request::has('territorialArea2') || Request::input('territorialArea2') == 'null'? null : Request::input('territorialArea2'),
            'territorial_area_3_074'    => !Request::has('territorialArea3') || Request::input('territorialArea3') == 'null'? null : Request::input('territorialArea3'),
            'cp_074'                    => Request::input('cp'),
            'locality_074'              => Request::input('locality'),
            'address_074'               => Request::input('address'),
            'contact_074'               => Request::input('contact'),
            'phone_074'                 => Request::input('phone'),
            'email_074'                 => Request::input('email'),
            'web_074'                   => Request::input('web')
        ]);
    }
}