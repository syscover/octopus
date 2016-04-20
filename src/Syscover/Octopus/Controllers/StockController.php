<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Support\Facades\File;
use Syscover\Pulsar\Libraries\Miscellaneous;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Product;
use Syscover\Octopus\Models\Request as RequestModel;
use Syscover\Octopus\Models\Order;
use Syscover\Octopus\Models\Stock;

/**
 * Class StockController
 * @package Syscover\Octopus\Controllers
 */

class StockController extends Controller
{
    protected $routeSuffix  = 'octopusStock';
    protected $folder       = 'stock';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_080', ['type' => 'date', 'data' => 'date_080', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_080'], 'phone_080'];
    protected $nameM        = 'id_080';
    protected $model        = Stock::class;
    protected $icon         = 'icon-refresh';
    protected $objectTrans  = 'stock';
    protected $viewParameters = [
        'newButton'             => false,
        'checkBoxColumn'        => true,
        'showButton'            => false,
        'editButton'            => true,
        'deleteButton'          => true,
        'deleteSelectButton'    => true,
        'relatedButton'         => false,
    ];

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        if($aObject['expiration_080'] > date('U') || $aObject['expiration_080'] == null)
        {
            $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.replaceStock(this)" data-href="' . route('createOctopusRequestFromStock', ['stock' => $actionUrlParameters['id'], 'offset' => 0]) . '" data-id="' . $aObject->id_080 . '" data-original-title="' . trans('octopus::pulsar.replace_stock') . '"><i class="fa fa-files-o"></i></a>';
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

        $order = Order::builder()->find($parameters['id']);

        $object = [
            'name_076'                  => $order->name_076,
            'alias_077'                 => $order->alias_077,
            'request_080'               => $order->request_079,
            'order_080'                 => $order->id_079,
            'supervisor_080'            => $order->supervisor_079,
            'customer_080'              => isset($order->customer_079)? $order->customer_079 : null,
            'shop_080'                  => $order->shop_079,
            'company_080'               => $order->company_079,
            'family_080'                => $order->family_079,
            'brand_080'                 => $order->brand_079,
            'product_080'               => $order->product_079,
            'laboratory_080'            => $order->laboratory_079,
            'id_address_080'            => isset($order->id_address_079)? $order->id_address_079 : null,
            'company_name_080'          => isset($order->company_name_079)? $order->company_name_079 : null,
            'name_080'                  => isset($order->name_079)? $order->name_079 : null,
            'surname_080'               => isset($order->surname_079)? $order->surname_079 : null,
            'country_080'               => $order->country_079,
            'territorial_area_1_080'    => isset($order->territorial_area_1_079)? $order->territorial_area_1_079 : null,
            'territorial_area_2_080'    => isset($order->territorial_area_2_079)? $order->territorial_area_2_079 : null,
            'territorial_area_3_080'    => isset($order->territorial_area_3_079)? $order->territorial_area_3_079 : null,
            'cp_080'                    => isset($order->cp_079)? $order->cp_079 : null,
            'locality_080'              => isset($order->locality_079)? $order->locality_079 : null,
            'address_080'               => isset($order->address_079)? $order->address_079 : null,
            'phone_080'                 => isset($order->phone_079)? $order->phone_079 : null,
            'email_080'                 => isset($order->email_079)? $order->email_079 : null,
            'observations_080'          => isset($order->observations_079)? $order->observations_079 : null,
            'view_height_080'           => $order->view_width_079,
            'view_width_080'            => $order->view_height_079,
            'total_height_080'          => isset($order->total_width_079)? $order->total_width_079 : null,
            'total_width_080'           => isset($order->total_height_079)? $order->total_height_079 : null,
            'units_080'                 => $order->units_079,
            'expiration_080'            => isset($order->expiration_079)? $order->expiration_079 : null,
            'expiration_text_080'       => isset($order->expiration_text_079)? $order->expiration_text_079 : null,
            'attachment_080'            => isset($order->attachment_079)? $order->attachment_079 : null,
            'comments_080'              => isset($order->comments_079)? $order->comments_079 : null,
        ];

        $parameters['object'] = (object)$object;

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
            File::copy(public_path() . '/packages/syscover/octopus/storage/attachment/order/' . $this->request->input('attachment'), public_path() . '/packages/syscover/octopus/storage/attachment/stock/' . $this->request->input('attachment'));
            $filename = $this->request->input('attachment');
        }

        $stock = Stock::create([
            'request_080'               => $this->request->input('request'),
            'order_080'                 => $this->request->input('order'),
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