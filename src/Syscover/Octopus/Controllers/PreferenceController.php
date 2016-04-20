<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;

/**
 * Class PreferenceController
 * @package Syscover\Octopus\Controllers
 */

class PreferenceController extends Controller
{
    protected $routeSuffix  = 'octopusPreference';
    protected $folder       = 'preference';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_200', 'name_200'];
    protected $nameM        = 'name_200';
    protected $model        = Preference::class;
    protected $icon         = 'icon-cog';
    protected $objectTrans  = 'preference';

    public function customIndex($parameters)
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