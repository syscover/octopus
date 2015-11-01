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
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Brand;

class Brands extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusBrand';
    protected $folder       = 'brands';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_071', 'name_071'];
    protected $nameM        = 'name_071';
    protected $model        = '\Syscover\Octopus\Models\Brand';
    protected $icon         = 'icomoon-icon-medal-2';
    protected $objectTrans  = 'brand';

    public function storeCustomRecord($request, $parameters)
    {
        Brand::create([
            'id_071'    => Request::input('id'),
            'name_071'  => Request::input('name')
        ]);
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Brand::where('id_071', $parameters['id'])->update([
            'id_071'    => Request::input('id'),
            'name_071'  => Request::input('name')
        ]);
    }
}