<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Address;

class Addresses extends Controller {

    use TraitController;

    protected $routeSuffix      = 'OctopusAddress';
    protected $folder           = 'addresses';
    protected $package          = 'octopus';
    protected $aColumns         = ['id_077', 'alias_077', 'address_077', 'locality_077', ['data' => 'email_077', 'type' => 'email'], 'phone_077', ['data' => 'favorite_077', 'type' => 'check']];
    protected $nameM            = 'alias_077';
    protected $model            = Address::class;
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
            'shop_077'                  => $this->request->input('ref'),
            'alias_077'                 => $this->request->input('alias'),
            'company_name_077'          => $this->request->input('companyName'),
            'name_077'                  => $this->request->input('name'),
            'surname_077'               => $this->request->input('surname'),
            'country_077'               => $this->request->input('country'),
            'territorial_area_1_077'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_077'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_077'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_077'                    => $this->request->input('cp'),
            'locality_077'              => $this->request->input('locality'),
            'address_077'               => $this->request->input('address'),
            'phone_077'                 => $this->request->input('phone'),
            'email_077'                 => $this->request->input('email'),
            'favorite_077'              => $this->request->input('favorite', 0)
        ]);

        $parameters['modal'] = 1;

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        if($this->request->input('favorite')) Address::resetFavorite($this->request->input('ref'));

        Address::where('id_077', $parameters['id'])->update([
            'alias_077'                 => $this->request->input('alias'),
            'company_name_077'          => $this->request->input('companyName'),
            'name_077'                  => $this->request->input('name'),
            'surname_077'               => $this->request->input('surname'),
            'country_077'               => $this->request->input('country'),
            'territorial_area_1_077'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_077'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_077'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_077'                    => $this->request->input('cp'),
            'locality_077'              => $this->request->input('locality'),
            'address_077'               => $this->request->input('address'),
            'phone_077'                 => $this->request->input('phone'),
            'email_077'                 => $this->request->input('email'),
            'favorite_077'              => $this->request->input('favorite', 0)
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

    public function jsonFavoriteAddress()
    {
        $parameters = $this->request->route()->parameters();

        $address = Address::getFavoriteAddressShop($parameters['shop']);

        return response()->json($address);
    }
}