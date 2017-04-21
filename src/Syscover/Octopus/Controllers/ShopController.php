<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Address;
use Syscover\Octopus\Models\Shop;

/**
 * Class ShopController
 * @package Syscover\Octopus\Controllers
 */

class ShopController extends Controller
{
    protected $routeSuffix  = 'octopusShop';
    protected $folder       = 'shop';
    protected $package      = 'octopus';
    protected $indexColumns = ['id_076', 'code_075', 'company_name_075', 'name_076', 'name_004', 'address_076', 'locality_076'];
    protected $nameM        = 'company_name_076';
    protected $model        = Shop::class;
    protected $icon         = 'icomoon-icon-office';
    protected $objectTrans  = 'shop';

    public function customIndex($parameters)
    {
        if(isset($parameters['modal']) && $parameters['modal'] == 1)
            $this->viewParameters['deleteSelectButton'] = false;

        return $parameters;
    }

    public function customJsonData($parameters)
    {
        if($parameters['modal'] == 1)
        {
            $this->viewParameters['checkBoxColumn'] = false;
            $this->viewParameters['relatedButton']  = true;
        }
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['tab'] = 1;

        return $actionUrlParameters;
    }

    public function storeCustomRecord($parameters)
    {
        $shop = Shop::create([
            'customer_id_076'           => $this->request->input('customerId'),
            'name_076'                  => $this->request->input('name'),
            'country_id_076'            => $this->request->input('country'),
            'territorial_area_1_id_076' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_076' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_076' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_076'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_076'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_076'               => $this->request->has('address')? $this->request->input('address') : null,
            'contact_076'               => $this->request->has('contact')? $this->request->input('contact') : null,
            'phone_076'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_076'                 => $this->request->has('email')? $this->request->input('email') : null,
            'web_076'                   => $this->request->has('web')? $this->request->input('web') : null
        ]);

        // create default address
        Address::create([
            'shop_id_077'               => $shop->id_076,
            'alias_077'                 => trans_choice('octopus::pulsar.shop', 1),
            'company_name_077'          => $this->request->input('name'),
            'name_077'                  => null,
            'surname_077'               => null,
            'country_id_077'            => $this->request->input('country'),
            'territorial_area_1_id_077' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_077' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_077' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_077'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_077'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_077'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_077'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_077'                 => $this->request->has('email')? $this->request->input('email') : null,
            'favorite_077'              => true
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Shop::where('id_076', $parameters['id'])->update([
            'customer_id_076'           => $this->request->input('customerId'),
            'name_076'                  => $this->request->input('name'),
            'country_id_076'            => $this->request->input('country'),
            'territorial_area_1_id_076' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_076' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_076' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
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