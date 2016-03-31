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
use Syscover\Octopus\Models\Request as RequestModel;
use Syscover\Octopus\Models\Order;
use Syscover\Octopus\Models\Stock;

class StockController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'octopusStock';
    protected $folder       = 'stock';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_080', ['type' => 'date', 'data' => 'date_080', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_080'], 'phone_080'];
    protected $nameM        = 'id_080';
    protected $model        = Stock::class;
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

//    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
//    {
//        if($aObject['order_078'] == null)
//        {
//            $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.createOrder(this)" data-href="' . route('createOctopusStock', $actionUrlParameters) . '" data-id="' . $aObject->id_079 . '" data-original-title="' . trans('octopus::pulsar.create_stock') . '"><i class="fa fa-retweet"></i></a>';
//        }
//        else
//        {
//            $actions = '';
//        }
//
//        return $actions;
//    }

    public function createCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->get();
        $parameters['object']       = Order::builder()->find($parameters['id']);

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        if($this->request->hasFile('attachment'))
        {
            $filename = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/stock');
        }
        elseif($this->request->has('attachment'))
        {
            File::copy(public_path() . '/packages/syscover/octopus/storage/attachment/request/' . $this->request->input('attachment'), public_path() . '/packages/syscover/octopus/storage/attachment/stock/' . $this->request->input('attachment'));
            $filename = $this->request->input('attachment');
        }

        $stock = Stock::create([
            'request_080'               => $this->request->input('request'),
            'supervisor_080'            => $this->request->input('supervisor'),
            'customer_080'              => $this->request->input('customer'),
            'shop_080'                  => $this->request->input('shopId'),
            'company_080'               => $this->request->input('company'),
            'family_080'                => $this->request->input('family'),
            'brand_080'                 => $this->request->input('brand'),
            'product_080'               => $this->request->input('product'),
            'laboratory_080'            => $this->request->input('laboratory'),
            'id_address_080'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_080'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_080'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_080'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_080'               => $this->request->input('country'),
            'territorial_area_1_080'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_080'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_080'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_080'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_080'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_080'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_080'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_080'                 => $this->request->has('email')? $this->request->input('email') : null,
            'observations_080'          => $this->request->has('observations')? $this->request->input('observations') : null,
            'date_080'                  => \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('date'))->getTimestamp(),
            'date_text_080'             => $this->request->input('date'),
            'view_height_080'           => $this->request->input('viewHeight'),
            'view_width_080'            => $this->request->input('viewWidth'),
            'total_height_080'          => $this->request->has('totalWidth')? $this->request->input('totalWidth') : null,
            'total_width_080'           => $this->request->has('totalHeight')? $this->request->input('totalHeight') : null,
            'units_080'                 => $this->request->input('units'),
            'expiration_080'            => $this->request->has('expiration')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('expiration'))->getTimestamp() : null,
            'expiration_text_080'       => $this->request->has('expiration')? $this->request->input('expiration') : null,
            'attachment_080'            => isset($filename)? $filename : null,
            'comments_080'              => $this->request->has('comments')? $this->request->input('comments') : null
        ]);

        RequestModel::where('id_078', $this->request->input('request'))->update([
            'stock_078' => $stock->id_080
        ]);
        Order::where('id_079', $this->request->input('order'))->update([
            'stock_079' => $stock->id_080
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('brand_072', $parameters['object']->brand_080)->get();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        $order = [
            'customer_080'              => $this->request->input('customer'),
            'shop_080'                  => $this->request->input('shopId'),
            'company_080'               => $this->request->input('company'),
            'family_080'                => $this->request->input('family'),
            'brand_080'                 => $this->request->input('brand'),
            'product_080'               => $this->request->input('product'),
            'id_address_080'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_080'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_080'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_080'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_080'               => $this->request->input('country'),
            'territorial_area_1_080'    => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_080'    => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_080'    => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_080'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_080'              => $this->request->has('locality')? $this->request->input('locality') : null,
            'address_080'               => $this->request->has('address')? $this->request->input('address') : null,
            'phone_080'                 => $this->request->has('phone')? $this->request->input('phone') : null,
            'email_080'                 => $this->request->has('email')? $this->request->input('email') : null,
            'observations_080'          => $this->request->has('observations')? $this->request->input('observations') : null,
            'view_height_080'           => $this->request->input('viewHeight'),
            'view_width_080'            => $this->request->input('viewWidth'),
            'total_height_080'          => $this->request->has('totalWidth')? $this->request->input('totalWidth') : null,
            'total_width_080'           => $this->request->has('totalHeight')? $this->request->input('totalHeight') : null,
            'units_080'                 => $this->request->input('units'),
            'expiration_080'            => $this->request->has('expiration')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('expiration'))->getTimestamp() : null,
            'expiration_text_080'       => $this->request->has('expiration')? $this->request->input('expiration') : null,
            'comments_080'              => $this->request->has('comments')? $this->request->input('comments') : null
        ];

        if($this->request->hasFile('attachment'))
            $order['attachment_080'] = Miscellaneous::uploadFiles('attachment', public_path() . '/packages/syscover/octopus/storage/attachment/stock');

        Stock::where('id_080', $parameters['id'])->update($order);
    }

    public function ajaxDeleteFile()
    {
        File::delete(public_path() . '/packages/syscover/octopus/storage/attachment/stock/' . $this->request->input('file'));

        Stock::where('id_080', $this->request->input('id'))->update([
            'attachment_080' => null,
        ]);

        return response()->json([
            'status'    => 'success',
            'file'      => $this->request->input('file'),
            'id'        => $this->request->input('id')
        ]);
    }
}