<?php namespace Syscover\Octopus\Controllers;

use Illuminate\Support\Facades\File;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Product;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Libraries\Miscellaneous;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Request as OctopusRequest;

class RequestController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusRequest';
    protected $folder       = 'request';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_078', ['type' => 'date', 'data' => 'date_078', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_078'], 'phone_078'];
    protected $nameM        = 'id_078';
    protected $model        = OctopusRequest::class;
    protected $icon         = 'fa fa-inbox';
    protected $objectTrans  = 'request';

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        if($aObject['order_078'] == null)
        {
            $actions = '<a class="btn btn-xs bs-tooltip" href="' . route('createOctopusOrder', $actionUrlParameters) . '" data-original-title="' . trans('octopus::pulsar.send_to_order') . '"><i class="fa fa-retweet"></i></a>';
        }
        else
        {

        }

        return $actions;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->get();

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        if($this->request->hasFile('attachment'))
            $filename = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/request');

        OctopusRequest::create([
            'supervisor_078'            => $this->request->input('supervisor'),
            'customer_078'              => $this->request->input('customer'),
            'shop_078'                  => $this->request->input('shopId'),
            'company_078'               => $this->request->input('company'),
            'family_078'                => $this->request->input('family'),
            'brand_078'                 => $this->request->input('brand'),
            'product_078'               => $this->request->input('product'),
            'id_address_078'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_078'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_078'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_078'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_078'               => $this->request->input('country'),
            'territorial_area_1_078'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_078'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_078'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_078'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_078'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_078'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_078'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_078'                 => $this->request->has('email')? $this->request->input('email') : null,
            'observations_078'          => $this->request->has('observations')? $this->request->input('observations') : null,
            'date_078'                  => \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('date'))->getTimestamp(),
            'date_text_078'             => $this->request->input('date'),
            'view_width_078'            => $this->request->input('viewWidth'),
            'view_height_078'           => $this->request->input('viewHeight'),
            'total_width_078'           => $this->request->has('totalWidth')? $this->request->input('totalWidth') : null,
            'total_height_078'          => $this->request->has('totalHeight')? $this->request->input('totalHeight') : null,
            'units_078'                 => $this->request->input('units'),
            'expiration_078'            => $this->request->has('expiration')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('expiration'))->getTimestamp() : null,
            'expiration_text_078'       => $this->request->has('expiration')? $this->request->input('expiration') : null,
            'attachment_078'            => $this->request->hasFile('attachment')? $filename : null,
            'comments_078'              => $this->request->has('comments')? $this->request->input('comments') : null
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('brand_072', $parameters['object']->brand_078)->get();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        $request = [
            'customer_078'              => $this->request->input('customer'),
            'shop_078'                  => $this->request->input('shopId'),
            'company_078'               => $this->request->input('company'),
            'family_078'                => $this->request->input('family'),
            'brand_078'                 => $this->request->input('brand'),
            'product_078'               => $this->request->input('product'),
            'id_address_078'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_078'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_078'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_078'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_078'               => $this->request->input('country'),
            'territorial_area_1_078'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_078'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_078'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_078'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_078'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_078'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_078'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_078'                 => $this->request->has('email')? $this->request->input('email') : null,
            'observations_078'          => $this->request->has('observations')? $this->request->input('observations') : null,
            'view_width_078'            => $this->request->input('viewWidth'),
            'view_height_078'           => $this->request->input('viewHeight'),
            'total_width_078'           => $this->request->has('totalWidth')? $this->request->input('totalWidth') : null,
            'total_height_078'          => $this->request->has('totalHeight')? $this->request->input('totalHeight') : null,
            'units_078'                 => $this->request->input('units'),
            'expiration_078'            => $this->request->has('expiration')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('expiration'))->getTimestamp() : null,
            'expiration_text_078'       => $this->request->has('expiration')? $this->request->input('expiration') : null,
            'comments_078'              => $this->request->has('comments')? $this->request->input('comments') : null
        ];

        if($this->request->hasFile('attachment'))
            $request['attachment_078'] = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/request');

        OctopusRequest::where('id_078', $parameters['id'])->update($request);
    }

    public function ajaxDeleteFile()
    {
        File::delete(public_path() . '/packages/syscover/octopus/storage/attachment/request/' . $this->request->input('file'));

        OctopusRequest::where('id_078', $this->request->input('id'))->update([
            'attachment_078' => null,
        ]);

        return response()->json([
            'status'    => 'success',
            'file'      => $this->request->input('file'),
            'id'        => $this->request->input('id')
        ]);
    }
}