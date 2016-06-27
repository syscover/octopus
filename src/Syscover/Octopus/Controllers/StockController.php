<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
    protected $aColumns     = ['id_080', ['type' => 'date', 'data' => 'date_080', 'format' => 'd-m-Y'], 'code_075', 'name_076',  'address_076', 'locality_076', 'name_072'];
    protected $nameM        = 'id_080';
    protected $model        = Stock::class;
    protected $icon         = 'fa fa-th-large';
    protected $objectTrans  = 'stock';
    
    function __construct(Request $request)
    {
        parent::__construct($request);

        $this->viewParameters['newButton']          = false;
        $this->viewParameters['checkBoxColumn']     = false;
        $this->viewParameters['showButton']         = true;
        $this->viewParameters['editButton']         = false;
        $this->viewParameters['deleteButton']       = false;
        $this->viewParameters['deleteSelectButton'] = false;

        $actions = $this->request->route()->getAction();

        // if request comes from supervisor
        if($actions['resource'] === 'octopus-supervisor-stock')
        {
            $this->routeSuffix = 'octopusSupervisorStock';
            $this->viewParameters['showButton']     = true;
        }

        // if request comes from laboratory
        if($actions['resource'] === 'octopus-laboratory-stock')
        {
            $this->routeSuffix = 'octopusLaboratoryStock';
        }
    }

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        $actions = $this->request->route()->getAction();

        if($aObject['expiration_080'] > date('U') || $aObject['expiration_080'] == null)
        {
            $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.replaceStock(this)" data-href="' . route($actions['resource'] === 'octopus-supervisor-stock'? 'createOctopusSupervisorRequestFromStock' : 'createOctopusRequestFromStock', ['stock' => $actionUrlParameters['id'], 'offset' => 0]) . '" data-id="' . $aObject->id_080 . '" data-original-title="' . trans('octopus::pulsar.replace_stock') . '"><i class="fa fa-files-o"></i></a>';
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
        $parameters['products']     = Product::builder()->where('active_072', true)->get();

        // decrypt id
        $parameters['id'] = Crypt::decrypt($parameters['id']);

        $order = Order::builder()->find($parameters['id']);

        if($order == null)
        {
            return redirect()->route($this->resource == 'octopus-stock'? 'octopusStock' : 'octopusLaboratoryOrder')->with([
                'msg'        => 2,
                'txtMsg'     => trans('octopus::pulsar.order_does_not_exist', [
                    'id' => $parameters['id']
                ])
            ]);
        }

        if($order->stock_id_079 != null)
        {
            return redirect()->route($this->resource == 'octopus-stock'? 'octopusStock' : 'octopusLaboratoryOrder')->with([
                'msg'        => 2,
                'txtMsg'     => trans('octopus::pulsar.stock_already_created', [
                    'id' => $order->id_079
                ])
            ]);
        }

        $object = [
            'name_076'                  => $order->name_076,
            'address_076'               => $order->address_076,
            'cp_076'                    => $order->cp_076,
            'locality_076'              => $order->locality_076,
            'alias_077'                 => $order->alias_077,
            'request_id_080'            => $order->request_id_079,
            'order_id_080'              => $order->id_079,
            'supervisor_id_080'         => $order->supervisor_id_079,
            'customer_id_080'           => isset($order->customer_id_079)? $order->customer_id_079 : null,
            'shop_id_080'               => $order->shop_id_079,
            'company_id_080'            => $order->company_id_079,
            'family_id_080'             => $order->family_id_079,
            'brand_id_080'              => $order->brand_id_079,
            'product_id_080'            => $order->product_id_079,
            'laboratory_id_080'         => $order->laboratory_id_079,
            'address_id_080'            => isset($order->address_id_079)? $order->address_id_079 : null,
            'company_name_080'          => isset($order->company_name_079)? $order->company_name_079 : null,
            'name_080'                  => isset($order->name_079)? $order->name_079 : null,
            'surname_080'               => isset($order->surname_079)? $order->surname_079 : null,
            'country_id_080'            => $order->country_id_079,
            'territorial_area_1_id_080' => isset($order->territorial_area_1_id_079)? $order->territorial_area_1_id_079 : null,
            'territorial_area_2_id_080' => isset($order->territorial_area_2_id_079)? $order->territorial_area_2_id_079 : null,
            'territorial_area_3_id_080' => isset($order->territorial_area_3_id_079)? $order->territorial_area_3_id_079 : null,
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
            'request_id_080'            => $this->request->input('request'),
            'order_id_080'              => $this->request->input('order'),
            'supervisor_id_080'         => $this->request->input('supervisor'),
            'customer_id_080'           => $this->request->input('customer'),
            'shop_id_080'               => $this->request->input('shopId'),
            'company_id_080'            => $this->request->input('company'),
            'family_id_080'             => $this->request->input('family'),
            'brand_id_080'              => $this->request->input('brand'),
            'product_id_080'            => $this->request->input('product'),
            'laboratory_id_080'         => $this->request->input('laboratory'),
            'address_id_080'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_080'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_080'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_080'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_id_080'            => $this->request->input('country'),
            'territorial_area_1_id_080' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_080' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_080' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
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
            'stock_id_078' => $stock->id_080
        ]);
        Order::where('id_079', $this->request->input('order'))->update([
            'stock_id_079' => $stock->id_080
        ]);

        $actions = $this->request->route()->getAction();
        if($actions['resource'] === 'octopus-laboratory-stock')
        {
            // redirect to orders
            return redirect()->route('octopusLaboratoryOrder')->with([
                'msg'        => 1,
                'txtMsg'     => trans('pulsar::pulsar.message_create_record_successful', [
                    'name' => $stock->id_080
                ])
            ]);
        }
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('active_072', true)->where('brand_id_072', $parameters['object']->brand_id_080)->get();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        $order = [
            'customer_id_080'           => $this->request->input('customer'),
            'shop_id_080'               => $this->request->input('shopId'),
            'company_id_080'            => $this->request->input('company'),
            'family_id_080'             => $this->request->input('family'),
            'brand_id_080'              => $this->request->input('brand'),
            'product_id_080'            => $this->request->input('product'),
            'address_id_080'            => $this->request->has('aliasId')? $this->request->input('aliasId') : null,
            'company_name_080'          => $this->request->has('companyName')? $this->request->input('companyName') : null,
            'name_080'                  => $this->request->has('name')? $this->request->input('name') : null,
            'surname_080'               => $this->request->has('surname')? $this->request->input('surname') : null,
            'country_id_080'            => $this->request->input('country'),
            'territorial_area_1_id_080' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_080' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_080' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
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

    public function showCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('active_072', true)->where('brand_id_072', $parameters['object']->brand_id_080)->get();

        if($parameters['object']->expiration_080 == null || $parameters['object']->expiration_080 > date('U'))
            $parameters['afterButtonFooter'] = '<a class="btn btn-danger margin-l10 delete-lang-record" href="' . route($parameters['resource'] === 'octopus-supervisor-stock'? 'createOctopusSupervisorRequestFromStock' : 'createOctopusRequestFromStock', ['stock' => $parameters['id'], 'offset' => $parameters['offset']]) . '">' . trans('octopus::pulsar.replace_stock') . '</a>';

        return $parameters;
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