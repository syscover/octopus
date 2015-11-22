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
use Syscover\Octopus\Models\Laboratory;

class Laboratories extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusLaboratory';
    protected $folder       = 'laboratories';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_073', 'company_name_073', ['data' => 'email_073', 'type' => 'email'], 'phone_073', 'contact_073'];
    protected $nameM        = 'name_company_073';
    protected $model        = '\Syscover\Octopus\Models\Laboratory';
    protected $icon         = 'icomoon-icon-lab';
    protected $objectTrans  = 'laboratory';

    public function storeCustomRecord($request, $parameters)
    {
        Laboratory::create([
            'company_name_073'          => $request->input('companyName'),
            'tin_073'                   => $request->input('tin'),
            'country_073'               => $request->input('country'),
            'territorial_area_1_073'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_073'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_073'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_073'                    => $request->input('cp'),
            'locality_073'              => $request->input('locality'),
            'address_073'               => $request->input('address'),
            'contact_073'               => $request->input('contact'),
            'phone_073'                 => $request->input('phone'),
            'email_073'                 => $request->input('email'),
            'web_073'                   => $request->input('web')
        ]);
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Laboratory::where('id_073', $parameters['id'])->update([
            'company_name_073'          => $request->input('companyName'),
            'tin_073'                   => $request->input('tin'),
            'country_073'               => $request->input('country'),
            'territorial_area_1_073'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_073'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_073'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_073'                    => $request->input('cp'),
            'locality_073'              => $request->input('locality'),
            'address_073'               => $request->input('address'),
            'contact_073'               => $request->input('contact'),
            'phone_073'                 => $request->input('phone'),
            'email_073'                 => $request->input('email'),
            'web_073'                   => $request->input('web')
        ]);
    }
}