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
use Syscover\Octopus\Models\Family;

class Families extends Controller {

    use TraitController;

    protected $routeSuffix  = 'OctopusFamily';
    protected $folder       = 'families';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_070', 'name_070'];
    protected $nameM        = 'name_070';
    protected $model        = '\Syscover\Octopus\Models\Family';
    protected $icon         = 'con-align-justify';
    protected $objectTrans  = 'family';

    public function storeCustomRecord()
    {
        Family::create([
            'id_070'    => Request::input('id'),
            'name_070'  => Request::input('name')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Family::where('id_070', $parameters['id'])->update([
            'id_070'    => Request::input('id'),
            'name_070'  => Request::input('name')
        ]);
    }
}