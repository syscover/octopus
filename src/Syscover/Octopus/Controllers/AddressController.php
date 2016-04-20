<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Octopus\Models\Address;

/**
 * Class AddressController
 * @package Syscover\Octopus\Controllers
 */

class AddressController extends Controller
{
    protected $routeSuffix  = 'octopusAddress';
    protected $folder       = 'address';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_077', 'alias_077', 'address_077', 'locality_077', ['data' => 'email_077', 'type' => 'email'], 'phone_077', ['data' => 'favorite_077', 'type' => 'check']];
    protected $nameM        = 'alias_077';
    protected $model        = Address::class;
    protected $icon         = 'fa fa-road';
    protected $objectTrans  = 'address';

    public function customIndex($parameters)
    {
        if(isset($parameters['modal']) && $parameters['modal'] == 1)
            $this->viewParameters['deleteSelectButton'] = false;

        return $parameters;
    }

    public function customJsonData($parameters)
    {
        if($parameters['modal'] == 1)
            $this->viewParameters['checkBoxColumn'] = false;
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['modal']   = true;
        $actionUrlParameters['ref']     = $parameters['ref'];

        return $actionUrlParameters;
    }

    public function storeCustomRecord($parameters)
    {
        Address::create([
            'shop_077'                  => $this->request->input('ref'),
            'alias_077'                 => $this->request->has('alias')? $this->request->input('alias') : null,
            'company_name_077'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_077'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_077'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_077'               => $this->request->input('country'),
            'territorial_area_1_077'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_077'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_077'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_077'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_077'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_077'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_077'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_077'                 => $this->request->has('email')? $this->request->input('email') : null,
            'favorite_077'              => $this->request->has('favorite')
        ]);

        $parameters['redirectModal'] = true;

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        if($this->request->input('favorite')) Address::resetFavorite($this->request->input('ref'));

        Address::where('id_077', $parameters['id'])->update([
            'alias_077'                 => $this->request->has('alias')? $this->request->input('alias') : null,
            'company_name_077'          => $this->request->input('companyName'),
            'name_077'                  => $this->request->input('name'),
            'surname_077'               => $this->request->input('surname'),
            'country_077'               => $this->request->input('country'),
            'territorial_area_1_077'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_077'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_077'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_077'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_077'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_077'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_077'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_077'                 => $this->request->has('email')? $this->request->input('email') : null,
            'favorite_077'              => $this->request->has('favorite')
        ]);

        $parameters['redirectModal'] = true;

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

    public function jsonFavoriteAddress()
    {
        $parameters     = $this->request->route()->parameters();
        $address        = Address::getFavoriteAddressShop($parameters['shop']);

        return response()->json($address);
    }
}