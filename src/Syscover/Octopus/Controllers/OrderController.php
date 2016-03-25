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

use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Product;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Order;
use Syscover\Octopus\Models\Request as RequestModel;

class OrderController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusOrder';
    protected $folder       = 'orders';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_079', ['type' => 'date', 'data' => 'date_079', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_079'], 'phone_079'];
    protected $nameM        = 'id_079';
    protected $model        = Order::class;
    protected $icon         = 'icon-refresh';
    protected $objectTrans  = 'order';

    public function createCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['object']       = RequestModel::getRecord($parameters);

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        Order::create([
            'supervisor_079'            => $this->request->input('supervisor'),
            'customer_079'              => $this->request->input('customer'),
            'shop_079'                  => $this->request->input('shopid'),
            'company_079'               => $this->request->input('company'),
            'family_079'                => $this->request->input('family'),
            'brand_079'                 => $this->request->input('brand'),
            'product_079'               => $this->request->input('product'),
            'laboratory_079'            => $this->request->input('laboratory'),
            'id_address_079'            => $this->request->input('aliasid'),
            'company_name_079'          => $this->request->input('companyName'),
            'name_079'                  => $this->request->input('name'),
            'surname_079'               => $this->request->input('surname'),
            'country_079'               => $this->request->input('country'),
            'territorial_area_1_079'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_079'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_079'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_079'                    => $this->request->input('cp'),
            'locality_079'              => $this->request->input('locality'),
            'address_079'               => $this->request->input('address'),
            'phone_079'                 => $this->request->input('phone'),
            'email_079'                 => $this->request->input('email'),
            'observations_079'          => $this->request->input('observations'),
            'date_079'                  => \DateTime::createFromFormat('d-m-Y',$this->request->input('date'))->getTimestamp(),
            'view_height_079'           => $this->request->input('viewHeight'),
            'view_width_079'            => $this->request->input('viewWidth'),
            'total_height_079'          => $this->request->input('totalHeight'),
            'total_width_079'           => $this->request->input('totalWidth'),
            'units_079'                 => $this->request->input('units'),
            'expiration_079'            => $this->request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$this->request->input('expiration'))->getTimestamp() : null,
            'attached_079'              => $this->request->input('attached'),
            'comments_079'              => $this->request->input('comments')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('brand_072', $parameters['object']->brand_079)->get();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Order::where('id_079', $parameters['id'])->update([
            'customer_079'              => $this->request->input('customer'),
            'shop_079'                  => $this->request->input('shopid'),
            'company_079'               => $this->request->input('company'),
            'family_079'                => $this->request->input('family'),
            'brand_079'                 => $this->request->input('brand'),
            'product_079'               => $this->request->input('product'),
            'laboratory_079'            => $this->request->input('laboratory'),
            'id_address_079'            => $this->request->input('aliasid'),
            'company_name_079'          => $this->request->input('companyName'),
            'name_079'                  => $this->request->input('name'),
            'surname_079'               => $this->request->input('surname'),
            'country_079'               => $this->request->input('country'),
            'territorial_area_1_079'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_079'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_079'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_079'                    => $this->request->input('cp'),
            'locality_079'              => $this->request->input('locality'),
            'address_079'               => $this->request->input('address'),
            'phone_079'                 => $this->request->input('phone'),
            'email_079'                 => $this->request->input('email'),
            'observations_079'          => $this->request->input('observations'),
            'view_height_079'           => $this->request->input('viewHeight'),
            'view_width_079'            => $this->request->input('viewWidth'),
            'total_height_079'          => $this->request->input('totalHeight'),
            'total_width_079'           => $this->request->input('totalWidth'),
            'units_079'                 => $this->request->input('units'),
            'expiration_079'            => $this->request->has('expiration')? \DateTime::createFromFormat('d-m-Y', $this->request->input('expiration'))->getTimestamp() : null,
            'attached_079'              => $this->request->input('attached'),
            'comments_079'              => $this->request->input('comments')
        ]);
    }
}