<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Product;

/**
 * Class ProductController
 * @package Syscover\Octopus\Controllers
 */

class ProductController extends Controller
{
    protected $routeSuffix  = 'octopusProduct';
    protected $folder       = 'product';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_072', 'name_071', 'name_072', ['data' => 'active_072', 'type' => 'active']];
    protected $nameM        = 'name_071';
    protected $model        = Product::class;
    protected $icon         = 'icomoon-icon-cube';
    protected $objectTrans  = 'product';

    public function createCustomRecord($parameters)
    {
        $parameters['brands'] = Brand::all();

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        Product::create([
            'id_072'        => $this->request->input('id'),
            'brand_id_072'  => $this->request->input('brand'),
            'name_072'      => $this->request->input('name'),
            'active_072'    => $this->request->has('active')
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
            'id_072'        => $this->request->input('id'),
            'brand_id_072'  => $this->request->input('brand'),
            'name_072'      => $this->request->input('name'),
            'active_072'    => $this->request->has('active')
        ]);
    }

    public function jsonBrandProducts()
    {
        $parameters = $this->request->route()->parameters();

        $products = Product::builder()->where('active_072', true)->where('brand_id_072', $parameters['brand'])->get();

        return response()->json($products);
    }
}