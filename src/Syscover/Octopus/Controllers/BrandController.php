<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Brand;

/**
 * Class BrandController
 * @package Syscover\Octopus\Controllers
 */

class BrandController extends Controller
{
    protected $routeSuffix  = 'octopusBrand';
    protected $folder       = 'brand';
    protected $package      = 'octopus';
    protected $indexColumns = ['id_071', 'name_071'];
    protected $nameM        = 'name_071';
    protected $model        = Brand::class;
    protected $icon         = 'icomoon-icon-medal-2';
    protected $objectTrans  = 'brand';

    public function storeCustomRecord($parameters)
    {
        Brand::create([
            'name_071'  => $this->request->input('name')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Brand::where('id_071', $parameters['id'])->update([
            'id_071'    => $this->request->input('id'),
            'name_071'  => $this->request->input('name')
        ]);
    }
}