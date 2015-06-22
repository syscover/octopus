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
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Product;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Octopus\Models\Order;

class Orders extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusOrder';
    protected $folder       = 'orders';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_079', ['type' => 'date', 'data' => 'date_079', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_079'], 'phone_079'];
    protected $nameM        = 'id_079';
    protected $model        = '\Syscover\Octopus\Models\Order';
    protected $icon         = 'icon-refresh';
    protected $objectTrans  = 'order';

    public function createCustomRecord($parameters)
    {
        $parameters['companies'] = Company::all();
        $parameters['families'] = Family::all();
        $parameters['brands']   = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord()
    {
        Order::create([
            'supervisor_079'            => Request::input('supervisor'),
            'customer_079'              => Request::input('customer'),
            'shop_079'                  => Request::input('shopid'),
            'company_079'               => Request::input('company'),
            'family_079'                => Request::input('family'),
            'brand_079'                 => Request::input('brand'),
            'product_079'               => Request::input('product'),
            'laboratory_079'            => Request::input('laboratory'),
            'id_address_079'            => Request::input('aliasid'),
            'company_name_079'          => Request::input('companyName'),
            'name_079'                  => Request::input('name'),
            'surname_079'               => Request::input('surname'),
            'country_079'               => Request::input('country'),
            'territorial_area_1_079'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_079'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_079'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_079'                    => Request::input('cp'),
            'locality_079'              => Request::input('locality'),
            'address_079'               => Request::input('address'),
            'phone_079'                 => Request::input('phone'),
            'email_079'                 => Request::input('email'),
            'observations_079'          => Request::input('observations'),
            'date_079'                  => \DateTime::createFromFormat('d-m-Y',Request::input('date'))->getTimestamp(),
            'view_height_079'           => Request::input('viewHeight'),
            'view_width_079'            => Request::input('viewWidth'),
            'total_height_079'          => Request::input('totalHeight'),
            'total_width_079'           => Request::input('totalWidth'),
            'units_079'                 => Request::input('units'),
            'expiration_079'            => Request::has('expiration')? \DateTime::createFromFormat('d-m-Y',Request::input('expiration'))->getTimestamp() : null,
            'attached_079'              => Request::input('attached'),
            'comments_079'              => Request::input('comments')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::getBrandProducts($parameters['object']->brand_079);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Order::where('id_079', $parameters['id'])->update([
            'customer_079'              => Request::input('customer'),
            'shop_079'                  => Request::input('shopid'),
            'company_079'               => Request::input('company'),
            'family_079'                => Request::input('family'),
            'brand_079'                 => Request::input('brand'),
            'product_079'               => Request::input('product'),
            'laboratory_079'            => Request::input('laboratory'),
            'id_address_079'            => Request::input('aliasid'),
            'company_name_079'          => Request::input('companyName'),
            'name_079'                  => Request::input('name'),
            'surname_079'               => Request::input('surname'),
            'country_079'               => Request::input('country'),
            'territorial_area_1_079'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_079'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_079'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_079'                    => Request::input('cp'),
            'locality_079'              => Request::input('locality'),
            'address_079'               => Request::input('address'),
            'phone_079'                 => Request::input('phone'),
            'email_079'                 => Request::input('email'),
            'observations_079'          => Request::input('observations'),
            'view_height_079'           => Request::input('viewHeight'),
            'view_width_079'            => Request::input('viewWidth'),
            'total_height_079'          => Request::input('totalHeight'),
            'total_width_079'           => Request::input('totalWidth'),
            'units_079'                 => Request::input('units'),
            'expiration_079'            => Request::has('expiration')? \DateTime::createFromFormat('d-m-Y',Request::input('expiration'))->getTimestamp() : null,
            'attached_079'              => Request::input('attached'),
            'comments_079'              => Request::input('comments')
        ]);
    }
}