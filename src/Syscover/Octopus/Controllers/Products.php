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

use Illuminate\Http\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Product;

class Products extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusProduct';
    protected $folder       = 'products';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_072', 'name_071', 'name_072'];
    protected $nameM        = 'name_071';
    protected $model        = '\Syscover\Octopus\Models\Product';
    protected $icon         = 'icomoon-icon-cube';
    protected $objectTrans  = 'product';

    public function createCustomRecord($request, $parameters)
    {
        $parameters['brands'] = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        Product::create([
            'id_072'    => $request->input('id'),
            'brand_072' => $request->input('brand'),
            'name_072'  => $request->input('name')
        ]);
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['brands'] = Brand::all();

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Product::where('id_072', $parameters['id'])->update([
            'id_072'    => $request->input('id'),
            'brand_072' => $request->input('brand'),
            'name_072'  => $request->input('name')
        ]);
    }

    public function jsonBrandProducts(Request $request)
    {
        $parameters = $request->route()->parameters();

        $products = Product::getBrandProducts($parameters['brand']);

        return response()->json($products);
    }
}