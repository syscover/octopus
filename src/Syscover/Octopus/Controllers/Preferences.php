<?php namespace Syscover\Octopus\Controllers;

/**
 * @package	    Forms
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Support\Facades\Request;
use Syscover\Forms\Models\State;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\ControllerTrait;

class Preferences extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'OctopusPreference';
    protected $folder       = 'preferences';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_200', 'name_200'];
    protected $nameM        = 'name_200';
    protected $model        = '\Syscover\Pulsar\Models\Preference';
    protected $icon         = 'icon-cog';
    protected $objectTrans  = 'preference';

    public function indexCustom($parameters)
    {
        $parameters['accounts'] = EmailAccount::all();
        $parameters['notificationsAccount']  = Preference::getValue('notificationsAccountOctopus', 4);

        return $parameters;
    }
    
    public function updateCustomRecord()
    {
        Preference::setValue('notificationsAccountOctopus', Request::input('notificationsAccount'), 4);
    }
}