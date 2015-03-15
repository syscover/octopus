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
use Syscover\Pulsar\Models\Country;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Octopus\Models\Laboratory;

class Laboratories extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusLaboratory';
    protected $folder       = 'laboratories';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_073', 'company_name_073', 'email_073', 'phone_073', 'contact_073'];
    protected $nameM        = 'name_company_073';
    protected $model        = '\Syscover\Octopus\Models\Laboratory';
    protected $icon         = 'icomoon-icon-lab';
    protected $objectTrans  = 'laboratory';

    public function storeCustomRecord()
    {
        Laboratory::create([
            'company_name_073'          => Request::input('companyName'),
            'tin_073'                   => Request::input('tin'),
            'country_073'               => Request::input('country'),
            'territorial_area_1_073'    => Request::input('territorialArea1') == 'null'? null : Request::input('territorialArea1'),
            'territorial_area_2_073'    => Request::input('territorialArea2') == 'null'? null : Request::input('territorialArea2'),
            'territorial_area_3_073'    => Request::input('territorialArea3') == 'null'? null : Request::input('territorialArea3'),
            'cp_073'                    => Request::input('cp'),
            'locality_073'              => Request::input('locality'),
            'address_073'               => Request::input('address'),
            'contact_073'               => Request::input('contact'),
            'phone_073'                 => Request::input('phone'),
            'email_073'                 => Request::input('email'),
            'web_073'                   => Request::input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Laboratory::where('id_073', $parameters['id'])->update([
            'company_name_073'          => Request::input('companyName'),
            'tin_073'                   => Request::input('tin'),
            'country_073'               => Request::input('country'),
            'territorial_area_1_073'    => Request::input('territorialArea1') == 'null'? null : Request::input('territorialArea1'),
            'territorial_area_2_073'    => Request::input('territorialArea2') == 'null'? null : Request::input('territorialArea2'),
            'territorial_area_3_073'    => Request::input('territorialArea3') == 'null'? null : Request::input('territorialArea3'),
            'cp_073'                    => Request::input('cp'),
            'locality_073'              => Request::input('locality'),
            'address_073'               => Request::input('address'),
            'contact_073'               => Request::input('contact'),
            'phone_073'                 => Request::input('phone'),
            'email_073'                 => Request::input('email'),
            'web_073'                   => Request::input('web')
        ]);
    }
}