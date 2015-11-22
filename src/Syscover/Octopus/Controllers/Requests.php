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
use Syscover\Octopus\Models\Request as OctopusRequest;

class Requests extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusRequest';
    protected $folder       = 'requests';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_078', ['type' => 'date', 'data' => 'date_078', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_078'], 'phone_078'];
    protected $nameM        = 'id_078';
    protected $model        = '\Syscover\Octopus\Models\Request';
    protected $icon         = 'icon-inbox';
    protected $objectTrans  = 'request';

    public function jsonCustomDataBeforeActions($request, $aObject, $actionUrlParameters, $parameters)
    {
        if($aObject['order_078'] == null)
        {
            $actions = '<a class="btn btn-xs bs-tooltip" href="' . route('createOctopusOrder', $actionUrlParameters) . '" data-original-title="' . trans('octopus::pulsar.send_to_order') . '"><i class="icon-refresh"></i></a>';
        }
        else
        {

        }

        return $actions;
    }

    public function createCustomRecord($request, $parameters)
    {
        $parameters['companies'] = Company::all();
        $parameters['families'] = Family::all();
        $parameters['brands']   = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        OctopusRequest::create([
            'supervisor_078'            => $request->input('supervisor'),
            'customer_078'              => $request->input('customer'),
            'shop_078'                  => $request->input('shopid'),
            'company_078'               => $request->input('company'),
            'family_078'                => $request->input('family'),
            'brand_078'                 => $request->input('brand'),
            'product_078'               => $request->input('product'),
            'id_address_078'            => $request->input('aliasid'),
            'company_name_078'          => $request->input('companyName'),
            'name_078'                  => $request->input('name'),
            'surname_078'               => $request->input('surname'),
            'country_078'               => $request->input('country'),
            'territorial_area_1_078'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_078'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_078'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_078'                    => $request->input('cp'),
            'locality_078'              => $request->input('locality'),
            'address_078'               => $request->input('address'),
            'phone_078'                 => $request->input('phone'),
            'email_078'                 => $request->input('email'),
            'observations_078'          => $request->input('observations'),
            'date_078'                  => \DateTime::createFromFormat('d-m-Y',$request->input('date'))->getTimestamp(),
            'view_height_078'           => $request->input('viewHeight'),
            'view_width_078'            => $request->input('viewWidth'),
            'total_height_078'          => $request->input('totalHeight'),
            'total_width_078'           => $request->input('totalWidth'),
            'units_078'                 => $request->input('units'),
            'expiration_078'            => $request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$request->input('expiration'))->getTimestamp() : null,
            'attached_078'              => $request->input('attached'),
            'comments_078'              => $request->input('comments')
        ]);
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::getBrandProducts($parameters['object']->brand_078);

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        OctopusRequest::where('id_078', $parameters['id'])->update([
            'customer_078'              => $request->input('customer'),
            'shop_078'                  => $request->input('shopid'),
            'company_078'               => $request->input('company'),
            'family_078'                => $request->input('family'),
            'brand_078'                 => $request->input('brand'),
            'product_078'               => $request->input('product'),
            'id_address_078'            => $request->input('aliasid'),
            'company_name_078'          => $request->input('companyName'),
            'name_078'                  => $request->input('name'),
            'surname_078'               => $request->input('surname'),
            'country_078'               => $request->input('country'),
            'territorial_area_1_078'    => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_078'    => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_078'    => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_078'                    => $request->input('cp'),
            'locality_078'              => $request->input('locality'),
            'address_078'               => $request->input('address'),
            'phone_078'                 => $request->input('phone'),
            'email_078'                 => $request->input('email'),
            'observations_078'          => $request->input('observations'),
            'view_height_078'           => $request->input('viewHeight'),
            'view_width_078'            => $request->input('viewWidth'),
            'total_height_078'          => $request->input('totalHeight'),
            'total_width_078'           => $request->input('totalWidth'),
            'units_078'                 => $request->input('units'),
            'expiration_078'            => $request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$request->input('expiration'))->getTimestamp() : null,
            'attached_078'              => $request->input('attached'),
            'comments_078'              => $request->input('comments')
        ]);
    }
}