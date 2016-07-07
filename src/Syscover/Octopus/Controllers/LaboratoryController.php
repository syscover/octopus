<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Laboratory;

/**
 * Class LaboratoryController
 * @package Syscover\Octopus\Controllers
 */

class LaboratoryController extends Controller
{
    protected $routeSuffix  = 'octopusLaboratory';
    protected $folder       = 'laboratory';
    protected $package      = 'octopus';
    protected $indexColumns     = ['id_073', 'company_name_073', ['data' => 'email_073', 'type' => 'email'], 'phone_073', 'contact_073'];
    protected $nameM        = 'name_company_073';
    protected $model        = Laboratory::class;
    protected $icon         = 'icomoon-icon-lab';
    protected $objectTrans  = 'laboratory';

    public function storeCustomRecord($parameters)
    {
        Laboratory::create([
            'company_name_073'          => $this->request->input('companyName'),
            'tin_073'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_id_073'            => $this->request->input('country'),
            'territorial_area_1_id_073' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_073' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_073' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_073'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_073'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_073'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_073'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_073'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_073'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_073'                   => $this->request->has('web')? $this->request->input('web') : null,
            'favorite_073'              => $this->request->has('favorite')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Laboratory::where('id_073', $parameters['id'])->update([
            'company_name_073'          => $this->request->input('companyName'),
            'tin_073'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_id_073'            => $this->request->input('country'),
            'territorial_area_1_id_073' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_073' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_073' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_073'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_073'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_073'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_073'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_073'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_073'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_073'                   => $this->request->has('web')? $this->request->input('web') : null,
            'favorite_073'              => $this->request->has('favorite')
        ]);
    }
}