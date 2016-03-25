<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\TraitController;

class PreferenceController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusPreference';
    protected $folder       = 'preference';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_200', 'name_200'];
    protected $nameM        = 'name_200';
    protected $model        = Preference::class;
    protected $icon         = 'icon-cog';
    protected $objectTrans  = 'preference';

    public function indexCustom($parameters)
    {
        $parameters['accounts'] = EmailAccount::all();
        $parameters['notificationsAccount']  = Preference::getValue('octopusNotificationsAccount', 8);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Preference::setValue('octopusNotificationsAccount', 8, $this->request->input('notificationsAccount'));
    }
}