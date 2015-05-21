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
use Illuminate\Http\Request as HttpRequest;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Octopus\Models\Address;

class Addresses extends Controller {

    use ControllerTrait;

    protected $routeSuffix      = 'OctopusAddress';
    protected $folder           = 'addresses';
    protected $package          = 'octopus';
    protected $aColumns         = ['id_077', 'alias_077', 'address_077', 'locality_077', ['data' => 'email_077', 'type' => 'email'], 'phone_077', ['data' => 'favorite_077', 'type' => 'check']];
    protected $nameM            = 'alias_077';
    protected $model            = '\Syscover\Octopus\Models\Address';
    protected $icon             = 'icon-road';
    protected $objectTrans      = 'address';

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['modal']   = true;
        $actionUrlParameters['ref']     = $parameters['ref'];

        return $actionUrlParameters;
    }

    public function storeCustomRecord($parameters)
    {
        Address::create([
            'shop_077'                  => Request::input('ref'),
            'alias_077'                 => Request::input('alias'),
            'company_name_077'          => Request::input('companyName'),
            'name_077'                  => Request::input('name'),
            'surname_077'               => Request::input('surname'),
            'country_077'               => Request::input('country'),
            'territorial_area_1_077'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_077'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_077'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_077'                    => Request::input('cp'),
            'locality_077'              => Request::input('locality'),
            'address_077'               => Request::input('address'),
            'phone_077'                 => Request::input('phone'),
            'email_077'                 => Request::input('email'),
            'favorite_077'              => Request::input('favorite', 0)
        ]);

        $parameters['modal'] = 1;

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        if(Request::input('favorite')) Address::resetFavorite(Request::input('ref'));

        Address::where('id_077', $parameters['id'])->update([
            'alias_077'                 => Request::input('alias'),
            'company_name_077'          => Request::input('companyName'),
            'name_077'                  => Request::input('name'),
            'surname_077'               => Request::input('surname'),
            'country_077'               => Request::input('country'),
            'territorial_area_1_077'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_077'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_077'    => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_077'                    => Request::input('cp'),
            'locality_077'              => Request::input('locality'),
            'address_077'               => Request::input('address'),
            'phone_077'                 => Request::input('phone'),
            'email_077'                 => Request::input('email'),
            'favorite_077'              => Request::input('favorite', 0)
        ]);

        $parameters['modal'] = 1;

        return $parameters;
    }

    public function deleteCustomRecordRedirect($object, $parameters)
    {
        $parameters['tab'] = 1;

        return redirect()->route('editOctopusShop', $parameters)->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_record_successful', ['name' => $object->{$this->nameM}])
        ]);
    }

    public function deleteCustomRecordsRedirect($parameters)
    {
        $parameters['tab'] = 1;

        return redirect()->route('editOctopusShop', $parameters)->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_records_successful')
        ]);
    }

    public function jsonFavoriteAddress(HttpRequest $request)
    {
        $parameters = $request->route()->parameters();

        $address = Address::getFavoriteAddressShop($parameters['shop']);

        return response()->json($address);
    }
}