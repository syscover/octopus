<?php namespace Syscover\Octopus\Controllers;

use Illuminate\Support\Facades\File;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Product;
use Syscover\Octopus\Models\Stock;
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
            $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.createOrder(this)" data-href="' . route('createOctopusOrder', $actionUrlParameters) . '" data-id="' . $aObject->id_078 . '" data-original-title="' . trans('octopus::pulsar.create_order') . '"><i class="fa fa-retweet"></i></a>';
        }
        else
        {
            $actions = '';
        }

        return $actions;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->get();

        if(isset($parameters['stock']))
        {
            $stock = Stock::builder()->find($parameters['stock']);
            $object = [
                'name_076'                  => $stock->name_076,
                'alias_077'                 => $stock->alias_077,
                'customer_078'              => isset($stock->customer_080)? $stock->customer_080 : null,
                'shop_078'                  => $stock->shop_080,
                'company_078'               => $stock->company_080,
                'family_078'                => $stock->family_080,
                'brand_078'                 => $stock->brand_080,
                'product_078'               => $stock->product_080,
                'id_address_078'            => isset($stock->id_address_080)? $stock->id_address_080 : null,
                'company_name_078'          => isset($stock->company_name_080)? $stock->company_name_080 : null,
                'name_078'                  => isset($stock->name_080)? $stock->name_080 : null,
                'surname_078'               => isset($stock->surname_080)? $stock->surname_080 : null,
                'country_078'               => $stock->country_080,
                'territorial_area_1_078'    => isset($stock->territorial_area_1_080)? $stock->territorial_area_1_080 : null,
                'territorial_area_2_078'    => isset($stock->territorial_area_2_080)? $stock->territorial_area_2_080 : null,
                'territorial_area_3_078'    => isset($stock->territorial_area_3_080)? $stock->territorial_area_3_080 : null,
                'cp_078'                    => isset($stock->cp_080)? $stock->cp_080 : null,
                'locality_078'              => isset($stock->locality_080)? $stock->locality_080 : null,
                'address_078'               => isset($stock->address_080)? $stock->address_080 : null,
                'phone_078'                 => isset($stock->phone_080)? $stock->phone_080 : null,
                'email_078'                 => isset($stock->email_080)? $stock->email_080 : null,
                'observations_078'          => isset($stock->observations_080)? $stock->observations_080 : null,
                'view_width_078'            => $stock->view_width_080,
                'view_height_078'           => $stock->view_height_080,
                'total_width_078'           => isset($stock->total_width_080)? $stock->total_width_080 : null,
                'total_height_078'          => isset($stock->total_height_080)? $stock->total_height_080 : null,
                'units_078'                 => $stock->units_080,
                'expiration_078'            => isset($stock->expiration_080)? $stock->expiration_080 : null,
                'expiration_text_078'       => isset($stock->expiration_text_080)? $stock->expiration_text_080 : null,
                'attachment_078'            => isset($stock->attachment_080)? $stock->attachment_080 : null,
                'comments_078'              => isset($stock->comments_080)? $stock->comments_080 : null,
            ];

            $parameters['object'] = (object)$object;
        }

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        if($this->request->hasFile('attachment'))
        {
            $filename = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/request');
        }
        elseif($this->request->has('attachment'))
        {
            File::copy(public_path() . '/packages/syscover/octopus/storage/attachment/stock/' . $this->request->input('attachment'), public_path() . '/packages/syscover/octopus/storage/attachment/request/' . $this->request->input('attachment'));
            $filename = $this->request->input('attachment');
        }

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
            'attachment_078'            => isset($filename)? $filename : null,
            'comments_078'              => $this->request->has('comments')? $this->request->input('comments') : null
        ]);

        if($this->request->has('stock'))
        {
            Stock::where('id_080', $this->request->input('stock'))->update([
                'expiration_080'        => date('U'),
                'expiration_text_080'   => date(config('pulsar.datePattern'))
            ]);
        }
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