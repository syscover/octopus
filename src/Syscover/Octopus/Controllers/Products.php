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

use Illuminate\Support\Facades\Input;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Octopus\Models\Brand;

class Products extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusProduct';
    protected $folder       = 'products';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_072', 'name_071', 'name_072'];
    protected $nameM        = 'name_071';
    protected $model        = '\Syscover\Octopus\Models\Product';
    protected $icon         = 'icomoon-icon-cube';
    protected $objectTrans  = 'product';

    public function createCustomRecord($parameters)
    {
        $parameters['brands'] = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord()
    {
        Product::create([
            'id_072'    => Input::get('id'),
            'brand_072' => Input::get('brand'),
            'name_072'  => Input::get('name')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['brands'] = Brand::all();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Product::where('id_072', $parameters['id'])->update([
            'id_072'    => Input::get('id'),
            'brand_072' => Input::get('brand'),
            'name_072'  => Input::get('name')
        ]);
    }
}