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
use Syscover\Octopus\Models\Shop;

class Shops extends Controller
{
    use TraitController;

    protected $routeSuffix  = 'OctopusShop';
    protected $folder       = 'shops';
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

    public function storeCustomRecord($parameters)
    {
        Shop::create([
            'customer_076'              => $this->request->input('customerid'),
            'name_076'                  => $this->request->input('name'),
            'tin_076'                   => $this->request->input('tin'),
            'country_076'               => $this->request->input('country'),
            'territorial_area_1_076'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_076'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_076'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_076'                    => $this->request->input('cp'),
            'locality_076'              => $this->request->input('locality'),
            'address_076'               => $this->request->input('address'),
            'contact_076'               => $this->request->input('contact'),
            'phone_076'                 => $this->request->input('phone'),
            'email_076'                 => $this->request->input('email'),
            'web_076'                   => $this->request->input('web')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Shop::where('id_076', $parameters['id'])->update([
            'customer_076'              => $this->request->input('customerid'),
            'name_076'                  => $this->request->input('name'),
            'tin_076'                   => $this->request->input('tin'),
            'country_076'               => $this->request->input('country'),
            'territorial_area_1_076'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_076'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_076'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_076'                    => $this->request->input('cp'),
            'locality_076'              => $this->request->input('locality'),
            'address_076'               => $this->request->input('address'),
            'contact_076'               => $this->request->input('contact'),
            'phone_076'                 => $this->request->input('phone'),
            'email_076'                 => $this->request->input('email'),
            'web_076'                   => $this->request->input('web')
        ]);
    }
}