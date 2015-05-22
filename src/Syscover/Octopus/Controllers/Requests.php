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
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Octopus\Models\Request as OctopusRequest;

class Requests extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusRequest';
    protected $folder       = 'requests';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_078', ['type' => 'date', 'data' => 'date_078', 'format' => 'd-m-Y'], 'code_075', 'name_076', ['type' => 'email', 'data' => 'email_078'], 'name_072', 'phone_078'];
    protected $nameM        = 'id_078';
    protected $model        = '\Syscover\Octopus\Models\Request';
    protected $icon         = 'icon-inbox';
    protected $objectTrans  = 'request';

    public function createCustomRecord($parameters)
    {
        $parameters['companies'] = Company::all();
        $parameters['families'] = Family::all();
        $parameters['brands']   = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord()
    {
        OctopusRequest::create([
            'supervisor_078'            => Request::input('supervisor'),
            'customer_078'              => Request::input('customer'),
            'shop_078'                  => Request::input('shopid'),
            'company_078'               => Request::input('company'),
            'family_078'                => Request::input('family'),
            'brand_078'                 => Request::input('brand'),
            'product_078'               => Request::input('product'),
            'id_address_078'            => Request::input('idAddress'),
            'company_name_078'          => Request::input('companyName'),
            'name_078'                  => Request::input('companyName'),
            'surname_078'               => Request::input('surname'),
            'country_078'               => Request::input('country'),
            'territorial_area_1_078'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_078'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_078'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_078'                    => Request::input('cp'),
            'locality_078'              => Request::input('locality'),
            'address_078'               => Request::input('address'),
            'phone_078'                 => Request::input('phone'),
            'email_078'                 => Request::input('email'),
            'observations_078'          => Request::input('observations'),
            'date_078'                  => \DateTime::createFromFormat('d-m-Y',Request::input('date'))->getTimestamp(),
            'view_height_078'           => Request::input('viewHeight'),
            'view_width_078'            => Request::input('viewWidth'),
            'total_height_078'          => Request::input('totalHeight'),
            'total_width_078'           => Request::input('totalWidth'),
            'units_078'                 => Request::input('units'),
            'expiration_078'            => Request::has('expiration')? \DateTime::createFromFormat('d-m-Y',Request::input('expiration'))->getTimestamp() : null,
            'attached_078'              => Request::input('attached'),
            'comments_078'              => Request::input('comments')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        OctopusRequest::where('id_078', $parameters['id'])->update([
            'supervisor_078'            => Request::input('supervisor'),
            'customer_078'              => Request::input('customer'),
            'shop_078'                  => Request::input('shop'),
            'company_078'               => Request::input('company'),
            'family_078'                => Request::input('family'),
            'brand_078'                 => Request::input('brand'),
            'product_078'               => Request::input('product'),
            'id_address_078'            => Request::input('idAddress'),
            'company_name_078'          => Request::input('companyName'),
            'name_078'                  => Request::input('companyName'),
            'surname_078'               => Request::input('surname'),
            'country_078'               => Request::input('country'),
            'territorial_area_1_078'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_078'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_078'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_078'                    => Request::input('cp'),
            'locality_078'              => Request::input('locality'),
            'address_078'               => Request::input('address'),
            'phone_078'                 => Request::input('phone'),
            'email_078'                 => Request::input('email'),
            'observations_078'          => Request::input('observations'),
            'date_078'                  => Request::input('date'),
            'view_height_078'           => Request::input('viewHeight'),
            'view_width_078'            => Request::input('viewWidth'),
            'total_height_078'          => Request::input('totalHeight'),
            'total_width_078'           => Request::input('totalWidth'),
            'units_078'                 => Request::input('units'),
            'expiration_078'            => Request::input('expiration'),
            'attached_078'              => Request::input('attached'),
            'comments_078'              => Request::input('comments')
        ]);
    }
}