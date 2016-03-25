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
    protected $model        = OctopusRequest::class;
    protected $icon         = 'icon-inbox';
    protected $objectTrans  = 'request';

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
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

    public function createCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        OctopusRequest::create([
            'supervisor_078'            => $this->request->input('supervisor'),
            'customer_078'              => $this->request->input('customer'),
            'shop_078'                  => $this->request->input('shopid'),
            'company_078'               => $this->request->input('company'),
            'family_078'                => $this->request->input('family'),
            'brand_078'                 => $this->request->input('brand'),
            'product_078'               => $this->request->input('product'),
            'id_address_078'            => $this->request->input('aliasid'),
            'company_name_078'          => $this->request->input('companyName'),
            'name_078'                  => $this->request->input('name'),
            'surname_078'               => $this->request->input('surname'),
            'country_078'               => $this->request->input('country'),
            'territorial_area_1_078'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_078'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_078'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_078'                    => $this->request->input('cp'),
            'locality_078'              => $this->request->input('locality'),
            'address_078'               => $this->request->input('address'),
            'phone_078'                 => $this->request->input('phone'),
            'email_078'                 => $this->request->input('email'),
            'observations_078'          => $this->request->input('observations'),
            'date_078'                  => \DateTime::createFromFormat('d-m-Y',$this->request->input('date'))->getTimestamp(),
            'view_height_078'           => $this->request->input('viewHeight'),
            'view_width_078'            => $this->request->input('viewWidth'),
            'total_height_078'          => $this->request->input('totalHeight'),
            'total_width_078'           => $this->request->input('totalWidth'),
            'units_078'                 => $this->request->input('units'),
            'expiration_078'            => $this->request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$this->request->input('expiration'))->getTimestamp() : null,
            'attached_078'              => $this->request->input('attached'),
            'comments_078'              => $this->request->input('comments')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('brand_072', $parameters['object']->brand_078)->get();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        OctopusRequest::where('id_078', $parameters['id'])->update([
            'customer_078'              => $this->request->input('customer'),
            'shop_078'                  => $this->request->input('shopid'),
            'company_078'               => $this->request->input('company'),
            'family_078'                => $this->request->input('family'),
            'brand_078'                 => $this->request->input('brand'),
            'product_078'               => $this->request->input('product'),
            'id_address_078'            => $this->request->input('aliasid'),
            'company_name_078'          => $this->request->input('companyName'),
            'name_078'                  => $this->request->input('name'),
            'surname_078'               => $this->request->input('surname'),
            'country_078'               => $this->request->input('country'),
            'territorial_area_1_078'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_078'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_078'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_078'                    => $this->request->input('cp'),
            'locality_078'              => $this->request->input('locality'),
            'address_078'               => $this->request->input('address'),
            'phone_078'                 => $this->request->input('phone'),
            'email_078'                 => $this->request->input('email'),
            'observations_078'          => $this->request->input('observations'),
            'view_height_078'           => $this->request->input('viewHeight'),
            'view_width_078'            => $this->request->input('viewWidth'),
            'total_height_078'          => $this->request->input('totalHeight'),
            'total_width_078'           => $this->request->input('totalWidth'),
            'units_078'                 => $this->request->input('units'),
            'expiration_078'            => $this->request->has('expiration')? \DateTime::createFromFormat('d-m-Y',$this->request->input('expiration'))->getTimestamp() : null,
            'attached_078'              => $this->request->input('attached'),
            'comments_078'              => $this->request->input('comments')
        ]);
    }
}