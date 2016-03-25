<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Family;

class FamilyController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusFamily';
    protected $folder       = 'family';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_070', 'name_070'];
    protected $nameM        = 'name_070';
    protected $model        = Family::class;
    protected $icon         = 'con-align-justify';
    protected $objectTrans  = 'family';

    public function storeCustomRecord($parameters)
    {
        Family::create([
            'id_070'    => $this->request->input('id'),
            'name_070'  => $this->request->input('name')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        Family::where('id_070', $parameters['id'])->update([
            'id_070'    => $this->request->input('id'),
            'name_070'  => $this->request->input('name')
        ]);
    }
}