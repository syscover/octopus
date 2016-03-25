<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Laboratory;

class LaboratoryController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusLaboratory';
    protected $folder       = 'laboratory';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_073', 'company_name_073', ['data' => 'email_073', 'type' => 'email'], 'phone_073', 'contact_073'];
    protected $nameM        = 'name_company_073';
    protected $model        = Laboratory::class;
    protected $icon         = 'icomoon-icon-lab';
    protected $objectTrans  = 'laboratory';

    public function storeCustomRecord($parameters)
    {
        Laboratory::create([
            'company_name_073'          => $this->request->input('companyName'),
            'tin_073'                   => $this->request->input('tin'),
            'country_073'               => $this->request->input('country'),
            'territorial_area_1_073'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_073'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_073'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_073'                    => $this->request->input('cp'),
            'locality_073'              => $this->request->input('locality'),
            'address_073'               => $this->request->input('address'),
            'contact_073'               => $this->request->input('contact'),
            'phone_073'                 => $this->request->input('phone'),
            'email_073'                 => $this->request->input('email'),
            'web_073'                   => $this->request->input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Laboratory::where('id_073', $parameters['id'])->update([
            'company_name_073'          => $this->request->input('companyName'),
            'tin_073'                   => $this->request->input('tin'),
            'country_073'               => $this->request->input('country'),
            'territorial_area_1_073'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_073'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_073'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_073'                    => $this->request->input('cp'),
            'locality_073'              => $this->request->input('locality'),
            'address_073'               => $this->request->input('address'),
            'contact_073'               => $this->request->input('contact'),
            'phone_073'                 => $this->request->input('phone'),
            'email_073'                 => $this->request->input('email'),
            'web_073'                   => $this->request->input('web')
        ]);
    }
}