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
    protected $model        = '\Syscover\Octopus\Models\Order';
    protected $icon         = 'icon-refresh';
    protected $objectTrans  = 'order';

    public function createCustomRecord($request, $parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['object']       = RequestModel::getCustomRecord($parameters);

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        Order::create([
            'supervisor_079'            => $request->input('supervisor'),
            'customer_079'              => $request->input('customer'),
            'shop_079'                  => $request->input('shopid'),
            'company_079'               => $request->input('company'),
            'family_079'                => $request->input('family'),
            'brand_079'                 => $request->input('brand'),
            'product_079'               => $request->input('product'),
            'laboratory_079'            => $request->input('laboratory'),
            'id_address_079'            => $request->input('aliasid'),
            'company_name_079'          => $request->input('companyName'),
            'name_079'                  => $request->input('name'),
            'surname_079'               => $request->input('surname'),
            'country_079'               => $request->input('country'),
            'territorial_area_1_079'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_079'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_079'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_079'                    => $request->input('cp'),
            'locality_079'              => $request->input('locality'),
            'address_079'               => $request->input('address'),
            'phone_079'                 => $request->input('phone'),
            'email_079'                 => $request->input('email'),
            'observations_079'          => $request->input('observations'),
            'date_079'                  => \DateTime::createFromFormat('d-m-Y',$request->input('date'))->getTimestamp(),
            'view_height_079'           => $request->input('viewHeight'),
            'view_width_079'            => $request->input('viewWidth'),
            'total_height_079'          => $request->input('totalHeight'),
            'total_width_079'           => $request->input('totalWidth'),
            'units_079'                 => $request->input('units'),
            'expiration_079'            => $request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$request->input('expiration'))->getTimestamp() : null,
            'attached_079'              => $request->input('attached'),
            'comments_079'              => $request->input('comments')
        ]);
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::getBrandProducts($parameters['object']->brand_079);

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Order::where('id_079', $parameters['id'])->update([
            'customer_079'              => $request->input('customer'),
            'shop_079'                  => $request->input('shopid'),
            'company_079'               => $request->input('company'),
            'family_079'                => $request->input('family'),
            'brand_079'                 => $request->input('brand'),
            'product_079'               => $request->input('product'),
            'laboratory_079'            => $request->input('laboratory'),
            'id_address_079'            => $request->input('aliasid'),
            'company_name_079'          => $request->input('companyName'),
            'name_079'                  => $request->input('name'),
            'surname_079'               => $request->input('surname'),
            'country_079'               => $request->input('country'),
            'territorial_area_1_079'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_079'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_079'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_079'                    => $request->input('cp'),
            'locality_079'              => $request->input('locality'),
            'address_079'               => $request->input('address'),
            'phone_079'                 => $request->input('phone'),
            'email_079'                 => $request->input('email'),
            'observations_079'          => $request->input('observations'),
            'view_height_079'           => $request->input('viewHeight'),
            'view_width_079'            => $request->input('viewWidth'),
            'total_height_079'          => $request->input('totalHeight'),
            'total_width_079'           => $request->input('totalWidth'),
            'units_079'                 => $request->input('units'),
            'expiration_079'            => $request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$request->input('expiration'))->getTimestamp() : null,
            'attached_079'              => $request->input('attached'),
            'comments_079'              => $request->input('comments')
        ]);
    }
}