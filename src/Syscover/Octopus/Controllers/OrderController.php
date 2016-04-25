<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Syscover\Octopus\Models\Shop;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Laboratory;
use Syscover\Octopus\Models\Product;
use Syscover\Octopus\Models\Order;
use Syscover\Octopus\Models\Request as RequestModel;
use Syscover\Pulsar\Libraries\Miscellaneous;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Models\User;

/**
 * Class OrderController
 * @package Syscover\Octopus\Controllers
 */

class OrderController extends Controller
{
    protected $routeSuffix  = 'octopusOrder';
    protected $folder       = 'order';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_079', ['type' => 'date', 'data' => 'date_079', 'format' => 'd-m-Y'], 'code_075', 'name_076', 'name_072', ['type' => 'email', 'data' => 'email_079'], 'phone_079'];
    protected $nameM        = 'id_079';
    protected $model        = Order::class;
    protected $icon         = 'icon-refresh';
    protected $objectTrans  = 'order';
    protected $viewParameters = [
        'newButton'             => false,
        'checkBoxColumn'        => true,
        'showButton'            => false,
        'editButton'            => true,
        'deleteButton'          => true,
        'deleteSelectButton'    => true,
        'relatedButton'         => false,
    ];

    function __construct(Request $request)
    {
        parent::__construct($request);

        $actions = $this->request->route()->getAction();

        // if request comes from delegate request, filter on model, only request from supervisor
        if($actions['resource'] === 'octopus-laboratory-order')
        {
            $this->routeSuffix                          = 'octopusLaboratoryOrder';
            $this->viewParameters['checkBoxColumn']     = false;
            $this->viewParameters['showButton']         = true;
        }

    }

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        $actions = $this->request->route()->getAction();

        if($aObject['stock_079'] == null)
        {
            $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.createStock(this)" data-href="' . route($actions['resource'] === 'octopus-laboratory-order'? 'createOctopusLaboratoryStock' : 'createOctopusStock', ['stock' => Crypt::encrypt($actionUrlParameters['id']), 'offset' => 0]) . '" data-id="' . $aObject->id_079 . '" data-original-title="' . trans('octopus::pulsar.create_stock') . '"><i class="fa fa-retweet"></i></a>';
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

        $request = RequestModel::builder()->find($parameters['id']);

        if($request == null)
        {
            return redirect()->route('octopusOrder')->with([
                'msg'        => 2,
                'txtMsg'     => trans('octopus::pulsar.request_does_not_exist', [
                    'id' => $parameters['id']
                ])
            ]);
        }

        if($request->order_078 != null)
        {
            return redirect()->route('octopusOrder')->with([
                'msg'        => 2,
                'txtMsg'     => trans('octopus::pulsar.order_already_created', [
                    'id' => $request->id_078
                ])
            ]);
        }

        $object = [
            'name_076'                  => $request->name_076,
            'alias_077'                 => $request->alias_077,
            'request_079'               => $request->id_078,
            'supervisor_079'            => $request->supervisor_078,
            'name_010'                  => $request->name_010,
            'surname_010'               => $request->surname_010,
            'customer_079'              => isset($request->customer_078)? $request->customer_078 : null,
            'shop_079'                  => $request->shop_078,
            'company_079'               => $request->company_078,
            'family_079'                => $request->family_078,
            'brand_079'                 => $request->brand_078,
            'product_079'               => $request->product_078,
            'id_address_079'            => isset($request->id_address_078)? $request->id_address_078 : null,
            'company_name_079'          => isset($request->company_name_078)? $request->company_name_078 : null,
            'name_079'                  => isset($request->name_078)? $request->name_078 : null,
            'surname_079'               => isset($request->surname_078)? $request->surname_078 : null,
            'country_079'               => $request->country_078,
            'territorial_area_1_079'    => isset($request->territorial_area_1_078)? $request->territorial_area_1_078 : null,
            'territorial_area_2_079'    => isset($request->territorial_area_2_078)? $request->territorial_area_2_078 : null,
            'territorial_area_3_079'    => isset($request->territorial_area_3_078)? $request->territorial_area_3_078 : null,
            'cp_079'                    => isset($request->cp_078)? $request->cp_078 : null,
            'locality_079'              => isset($request->locality_078)? $request->locality_078 : null,
            'address_079'               => isset($request->address_078)? $request->address_078 : null,
            'phone_079'                 => isset($request->phone_078)? $request->phone_078 : null,
            'email_079'                 => isset($request->email_078)? $request->email_078 : null,
            'observations_079'          => isset($request->observations_078)? $request->observations_078 : null,
            'view_height_079'           => $request->view_width_078,
            'view_width_079'            => $request->view_height_078,
            'total_height_079'          => isset($request->total_width_078)? $request->total_width_078 : null,
            'total_width_079'           => isset($request->total_height_078)? $request->total_height_078 : null,
            'units_079'                 => $request->units_078,
            'expiration_079'            => isset($request->expiration_078)? $request->expiration_078 : null,
            'expiration_text_079'       => isset($request->expiration_text_078)? $request->expiration_text_078 : null,
            'attachment_079'            => isset($request->attachment_078)? $request->attachment_078 : null,
            'comments_079'              => isset($request->comments_078)? $request->comments_078 : null,
        ];

        $parameters['object'] = (object)$object;

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

        $this->sendOrderEmail($order->id_079, 'store');
    }

    public function editCustomRecord($parameters)
    {
        $parameters['companies']            = Company::all();
        $parameters['families']             = Family::all();
        $parameters['brands']               = Brand::all();
        $parameters['products']             = Product::builder()->where('active_072', true)->where('brand_072', $parameters['object']->brand_079)->get();

        // create stock by manager
        $parameters['afterButtonFooter']    = '<a class="btn btn-danger margin-l10 delete-lang-record" href="' . route('createOctopusStock', ['id' => $parameters['id'], 'offset' => $parameters['offset']]) . '">' . trans('octopus::pulsar.create_order') . '</a>';

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

        $this->sendOrderEmail($order->id_079, 'update');
    }

    public function showCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('active_072', true)->where('brand_072', $parameters['object']->brand_079)->get();

        if($parameters['resource'] === 'octopus-request')
            $parameters['afterButtonFooter']    = '<a class="btn btn-danger margin-l10 delete-lang-record" href="' . route($parameters['resource'] === 'octopus-laboratory-order'? 'createOctopusLaboratoryStock' : 'createOctopusStock', ['id' => $parameters['id'], 'offset' => $parameters['offset']]) . '">' . trans('octopus::pulsar.create_order') . '</a>';

        return $parameters;
    }

    private function sendOrderEmail($id, $action)
    {
        // send email confirmation
        $order                  = Order::builder()->find($id);
        $laboratory             = Laboratory::builder()->where('favorite_073', true)->get()->first();

        // get notification account
        $notificationsAccount   = Preference::getValue('octopusNotificationsAccount', 8);
        $emailAccount           = EmailAccount::find($notificationsAccount->value_018);

        if($emailAccount == null) return null;

        config(['mail.host'         =>  $emailAccount->outgoing_server_013]);
        config(['mail.port'         =>  $emailAccount->outgoing_port_013]);
        config(['mail.from'         =>  ['address' => $emailAccount->email_013, 'name' => $emailAccount->name_013]]);
        config(['mail.encryption'   =>  $emailAccount->outgoing_secure_013 == 'null'? null : $emailAccount->outgoing_secure_013]);
        config(['mail.username'     =>  $emailAccount->outgoing_user_013]);
        config(['mail.password'     =>  Crypt::decrypt($emailAccount->outgoing_pass_013)]);

        $supervisor = User::builder()->find($order->supervisor_079);
        $shop       = Shop::builder()->find($order->shop_079);

        // send email to laboratory
        $dataMessage = [
            'emailTo'           => $laboratory->email_073,
            'nameTo'            => $laboratory->company_name_073,
            'subject'           => trans($action == 'update'? 'octopus::pulsar.order_subject_update' : 'octopus::pulsar.order_subject_create', ['id' => $order->id_079, 'name' => $supervisor->name_010, 'surname' => $supervisor->surname_010]),
            'order'             => $order,
            'supervisor'        => $supervisor,
            'shop'              => $shop,
            'key'               => Crypt::encrypt($order->id_079),
            'actions'           => 'laboratory_order_actions_notification'
        ];

        Mail::send('octopus::emails.order_notification', $dataMessage, function($m) use ($dataMessage) {
            $m->to($dataMessage['emailTo'], $dataMessage['nameTo'])
                ->subject($dataMessage['subject']);
        });
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