<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Shop;

class ShopController extends Controller
{
    use TraitController;

    protected $routeSuffix  = 'octopusShop';
    protected $folder       = 'shop';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_076', 'company_name_075', 'name_076', ['data' => 'email_076', 'type' => 'email'], 'phone_076', 'contact_076'];
    protected $nameM        = 'company_name_076';
    protected $model        = Shop::class;
    protected $icon         = 'icomoon-icon-office';
    protected $objectTrans  = 'shop';

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        // init record on tap 2
        $actionUrlParameters['tab'] = 2;

        return $actionUrlParameters;
    }

    public function setViewParametersJsonData($parameters)
    {
        if($parameters['modal'] == 1)
            $this->viewParameters['checkBoxColumn'] = false;
    }

    public function storeCustomRecord($parameters)
    {
        Shop::create([
            'customer_076'              => $this->request->input('customerId'),
            'name_076'                  => $this->request->input('name'),
            'tin_076'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_076'               => $this->request->input('country'),
            'territorial_area_1_076'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_076'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_076'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_076'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_076'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_076'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_076'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_076'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_076'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_076'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Shop::where('id_076', $parameters['id'])->update([
            'customer_076'              => $this->request->input('customerId'),
            'name_076'                  => $this->request->input('name'),
            'tin_076'                   => $this->request->has('tin')? $this->request->input('tin') : null,
            'country_076'               => $this->request->input('country'),
            'territorial_area_1_076'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_076'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_076'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_076'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_076'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_076'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_076'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_076'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_076'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_076'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);
    }
}