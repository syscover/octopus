<?php namespace Syscover\Octopus\Controllers;

use Illuminate\Http\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Product;

class ProductController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusProduct';
    protected $folder       = 'product';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_072', 'name_071', 'name_072'];
    protected $nameM        = 'name_071';
    protected $model        = Product::class;
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

        $products = Product::builder()->where('brand_072', $parameters['brand'])->get();

        return response()->json($products);
    }
}