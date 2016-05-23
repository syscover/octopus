<?php namespace Syscover\Octopus\Controllers;

use Illuminate\Http\Request;
use Syscover\Pulsar\Core\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Models\Profile;

/**
 * Class PreferenceController
 * @package Syscover\Octopus\Controllers
 */

class PreferenceController extends Controller
{
    protected $routeSuffix  = 'octopusPreference';
    protected $folder       = 'preference';
    protected $package      = 'octopus';
    protected $model        = Preference::class;
    protected $icon         = 'icon-cog';
    protected $objectTrans  = 'preference';

    function __construct(Request $request)
    {
        parent::__construct($request);

        $this->viewParameters['cancelButton'] = false;
    }

    public function customIndex($parameters)
    {
        $parameters['accounts']             = EmailAccount::all();
        $parameters['profiles']             = Profile::all();

        $parameters['notificationsAccount'] = Preference::getValue('octopusNotificationsAccount', 8);
        $parameters['managerProfile']       = Preference::getValue('octopusManagerProfile', 8);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Preference::setValue('octopusNotificationsAccount', 8, $this->request->input('notificationsAccount'));
        Preference::setValue('octopusManagerProfile', 8, $this->request->input('managerProfile'));
    }
}