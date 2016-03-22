<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Brand;

class BrandController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusBrand';
    protected $folder       = 'brand';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_071', 'name_071'];
    protected $nameM        = 'name_071';
    protected $model        = Brand::class;
    protected $icon         = 'icomoon-icon-medal-2';
    protected $objectTrans  = 'brand';

    public function storeCustomRecord($request, $parameters)
    {
        Brand::create([
            'id_071'    => $request->input('id'),
            'name_071'  => $request->input('name')
        ]);
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Brand::where('id_071', $parameters['id'])->update([
            'id_071'    => $request->input('id'),
            'name_071'  => $request->input('name')
        ]);
    }
}