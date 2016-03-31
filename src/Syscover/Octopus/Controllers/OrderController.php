<?php namespace Syscover\Octopus\Controllers;

use Illuminate\Support\Facades\File;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Libraries\Miscellaneous;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Laboratory;
use Syscover\Octopus\Models\Product;
use Syscover\Octopus\Models\Order;
use Syscover\Octopus\Models\Request as RequestModel;

class OrderController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusOrder';
    protected $folder       = 'order';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_079', ['type' => 'date', 'data' => 'date_079', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_079'], 'phone_079'];
    protected $nameM        = 'id_079';
    protected $model        = Order::class;
    protected $icon         = 'icon-refresh';
    protected $objectTrans  = 'order';
    protected $viewParameters = [
        'newButton'             => false,   // button from index view to create record
        'checkBoxColumn'        => true,    // checkbox from index view to select various records
        'showButton'            => false,   // button from ajax response, to view record
        'editButton'            => true,    // button from ajax response, to edit record
        'deleteButton'          => true,    // button from ajax response, to delete record
        'deleteSelectButton'    => true     // button delete records when select checkbox on index view
    ];

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        if($aObject['stock_079'] == null)
        {
            $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.createStock(this)" data-href="' . route('createOctopusStock', $actionUrlParameters) . '" data-id="' . $aObject->id_079 . '" data-original-title="' . trans('octopus::pulsar.create_stock') . '"><i class="fa fa-retweet"></i></a>';
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
        $parameters['object']       = RequestModel::builder()->find($parameters['id']);

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        if($this->request->hasFile('attachment'))
        {
            $filename = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/order');
        }
        elseif($this->request->has('attachment'))
        {
            File::copy(public_path() . '/packages/syscover/octopus/storage/attachment/request/' . $this->request->input('attachment'), public_path() . '/packages/syscover/octopus/storage/attachment/order/' . $this->request->input('attachment'));
            $filename = $this->request->input('attachment');
        }

        $laboratory = Laboratory::builder()->where('favorite_073', true)->get()->first();

        $order = Order::create([
            'request_079'               => $this->request->input('request'),
            'supervisor_079'            => $this->request->input('supervisor'),
            'customer_079'              => $this->request->input('customer'),
            'shop_079'                  => $this->request->input('shopId'),
            'company_079'               => $this->request->input('company'),
            'family_079'                => $this->request->input('family'),
            'brand_079'                 => $this->request->input('brand'),
            'product_079'               => $this->request->input('product'),
            'laboratory_079'            => $laboratory->id_073,
            'id_address_079'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_079'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_079'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_079'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_079'               => $this->request->input('country'),
            'territorial_area_1_079'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_079'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_079'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_079'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_079'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_079'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_079'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_079'                 => $this->request->has('email')? $this->request->input('email') : null,
            'observations_079'          => $this->request->has('observations')? $this->request->input('observations') : null,
            'date_079'                  => \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('date'))->getTimestamp(),
            'date_text_079'             => $this->request->input('date'),
            'view_height_079'           => $this->request->input('viewHeight'),
            'view_width_079'            => $this->request->input('viewWidth'),
            'total_height_079'          => $this->request->has('totalWidth')? $this->request->input('totalWidth') : null,
            'total_width_079'           => $this->request->has('totalHeight')? $this->request->input('totalHeight') : null,
            'units_079'                 => $this->request->input('units'),
            'expiration_079'            => $this->request->has('expiration')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('expiration'))->getTimestamp() : null,
            'expiration_text_079'       => $this->request->has('expiration')? $this->request->input('expiration') : null,
            'attachment_079'            => isset($filename)? $filename : null,
            'comments_079'              => $this->request->has('comments')? $this->request->input('comments') : null
        ]);

        RequestModel::where('id_078', $this->request->input('request'))->update([
            'order_078' => $order->id_079
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('brand_072', $parameters['object']->brand_079)->get();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        $order = [
            'customer_079'              => $this->request->input('customer'),
            'shop_079'                  => $this->request->input('shopId'),
            'company_079'               => $this->request->input('company'),
            'family_079'                => $this->request->input('family'),
            'brand_079'                 => $this->request->input('brand'),
            'product_079'               => $this->request->input('product'),
            'id_address_079'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_079'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_079'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_079'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_079'               => $this->request->input('country'),
            'territorial_area_1_079'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_079'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_079'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_079'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_079'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_079'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_079'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_079'                 => $this->request->has('email')? $this->request->input('email') : null,
            'observations_079'          => $this->request->has('observations')? $this->request->input('observations') : null,
            'view_height_079'           => $this->request->input('viewHeight'),
            'view_width_079'            => $this->request->input('viewWidth'),
            'total_height_079'          => $this->request->has('totalWidth')? $this->request->input('totalWidth') : null,
            'total_width_079'           => $this->request->has('totalHeight')? $this->request->input('totalHeight') : null,
            'units_079'                 => $this->request->input('units'),
            'expiration_079'            => $this->request->has('expiration')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('expiration'))->getTimestamp() : null,
            'expiration_text_079'       => $this->request->has('expiration')? $this->request->input('expiration') : null,
            'comments_079'              => $this->request->has('comments')? $this->request->input('comments') : null
        ];

        if($this->request->hasFile('attachment'))
            $order['attachment_079'] = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/order');

        Order::where('id_079', $parameters['id'])->update($order);
    }

    public function ajaxDeleteFile()
    {
        File::delete(public_path() . '/packages/syscover/octopus/storage/attachment/order/' . $this->request->input('file'));

        Order::where('id_079', $this->request->input('id'))->update([
            'attachment_079' => null,
        ]);

        return response()->json([
            'status'    => 'success',
            'file'      => $this->request->input('file'),
            'id'        => $this->request->input('id')
        ]);
    }
}