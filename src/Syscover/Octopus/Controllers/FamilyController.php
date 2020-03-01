<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Family;

/**
 * Class FamilyController
 * @package Syscover\Octopus\Controllers
 */

class FamilyController extends Controller
{
    protected $routeSuffix  = 'octopusFamily';
    protected $folder       = 'family';
    protected $package      = 'octopus';
    protected $indexColumns = ['id_070', 'name_070'];
    protected $nameM        = 'name_070';
    protected $model        = Family::class;
    protected $icon         = 'con-align-justify';
    protected $objectTrans  = 'family';

    public function storeCustomRecord($parameters)
    {
        Family::create([
            'name_070'  => $this->request->input('name')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Family::where('id_070', $parameters['id'])->update([
            'name_070'  => $this->request->input('name')
        ]);
    }
}