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

use Illuminate\Support\Facades\Input;
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
            'company_name_073'          => Input::get('companyName'),
            'tin_073'                   => Input::get('tin'),
            'country_073'               => Input::get('country'),
            'territorial_area_1_073'    => Input::get('territorialArea1') == 'null'? null : Input::get('territorialArea1'),
            'territorial_area_2_073'    => Input::get('territorialArea2') == 'null'? null : Input::get('territorialArea2'),
            'territorial_area_3_073'    => Input::get('territorialArea3') == 'null'? null : Input::get('territorialArea3'),
            'cp_073'                    => Input::get('cp'),
            'locality_073'              => Input::get('locality'),
            'address_073'               => Input::get('address'),
            'contact_073'               => Input::get('contact'),
            'phone_073'                 => Input::get('phone'),
            'email_073'                 => Input::get('email'),
            'web_073'                   => Input::get('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Laboratory::where('id_073', $parameters['id'])->update([
            'company_name_073'          => Input::get('companyName'),
            'tin_073'                   => Input::get('tin'),
            'country_073'               => Input::get('country'),
            'territorial_area_1_073'    => Input::get('territorialArea1') == 'null'? null : Input::get('territorialArea1'),
            'territorial_area_2_073'    => Input::get('territorialArea2') == 'null'? null : Input::get('territorialArea2'),
            'territorial_area_3_073'    => Input::get('territorialArea3') == 'null'? null : Input::get('territorialArea3'),
            'cp_073'                    => Input::get('cp'),
            'locality_073'              => Input::get('locality'),
            'address_073'               => Input::get('address'),
            'contact_073'               => Input::get('contact'),
            'phone_073'                 => Input::get('phone'),
            'email_073'                 => Input::get('email'),
            'web_073'                   => Input::get('web')
        ]);
    }
}