<?php namespace Syscover\Octopus\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Syscover\Octopus\Models\Brand;
use Syscover\Octopus\Models\Company;
use Syscover\Octopus\Models\Family;
use Syscover\Octopus\Models\Product;
use Syscover\Octopus\Models\Shop;
use Syscover\Octopus\Models\Stock;
use Syscover\Pulsar\Libraries\Miscellaneous;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Models\User;
use Syscover\Octopus\Models\Request as OctopusRequest;

/**
 * Class RequestController
 * @package Syscover\Octopus\Controllers
 */

class RequestController extends Controller
{
    protected $routeSuffix  = 'octopusRequest';
    protected $folder       = 'request';
    protected $package      = 'octopus';
    protected $aColumns     = ['id_078', ['type' => 'date', 'data' => 'date_078', 'format' => 'd-m-Y'], 'code_075', 'name_076',  'address_076', 'locality_076', 'name_072'];
    protected $nameM        = 'id_078';
    protected $model        = OctopusRequest::class;
    protected $icon         = 'fa fa-inbox';
    protected $objectTrans  = 'request';

    function __construct(Request $request)
    {
        parent::__construct($request);

        $actions = $this->request->route()->getAction();

        // if request comes from delegate request, filter on model, only request from supervisor
        if($actions['resource'] === 'octopus-supervisor-request')
            $this->routeSuffix = 'octopusSupervisorRequest';
    }

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        $actions = $this->request->route()->getAction();

        if($aObject['order_078'] == null)
        {
            $this->viewParameters['deleteButton']   = true;
            $this->viewParameters['editButton']     = true;
            $this->viewParameters['showButton']     = false;

            if($actions['resource'] === 'octopus-request')
                $actions = '<a class="create-order btn btn-xs bs-tooltip" onclick="$.createOrder(this)" data-href="' . route('createOctopusOrder', ['id' => $actionUrlParameters['id'], 'offset' => $actionUrlParameters['offset']]) . '" data-id="' . $aObject->id_078 . '" data-original-title="' . trans('octopus::pulsar.create_order') . '"><i class="fa fa-retweet"></i></a>';
            else
                $actions = '';
        }
        else
        {
            $this->viewParameters['deleteButton']   = false;
            $this->viewParameters['editButton']     = false;
            $this->viewParameters['showButton']     = true;

            if($aObject['stock_078'] != null)
                $actions = '<a class="btn btn-xs bs-tooltip" href="' . route($actions['resource'] === 'octopus-supervisor-request'? 'showOctopusSupervisorStock' : 'showOctopusStock', ['id' => $aObject->stock_078, 'offset' => 0]) . '" data-original-title="' . trans('octopus::pulsar.view_stock') . '"><i class="fa fa-th-large"></i></a>';
            else
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

        $octopusRequest = OctopusRequest::create([
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

        // si la peticion proviene de un stock, damos por expirado el stock duplicado
        if($this->request->has('stock'))
        {
            Stock::where('id_080', $this->request->input('stock'))->update([
                'expiration_080'        => date('U'),
                'expiration_text_080'   => date(config('pulsar.datePattern'))
            ]);
        }

        $this->sendRequestEmail($octopusRequest->id_078, 'store');
    }

    public function editCustomRecord($parameters)
    {
        if($parameters['object'] == null)
        {
            // si es un supervidor, le redirigimos al listado de peticiones, si es un gestor al listado de peticiones del gestor
            return redirect()->route($parameters['resource'] === 'octopus-supervisor-request'? 'octopusSupervisorRequest' : 'octopusRequest')->with([
                'msg'        => 2,
                'txtMsg'     => trans('octopus::pulsar.request_does_not_exist', [
                    'id' => $parameters['id']
                ])
            ]);
        }

        $parameters['companies']            = Company::all();
        $parameters['families']             = Family::all();
        $parameters['brands']               = Brand::all();
        $parameters['products']             = Product::builder()->where('active_072', true)->where('brand_072', $parameters['object']->brand_078)->get();

        if($parameters['resource'] === 'octopus-request')
            $parameters['afterButtonFooter']    = '<a class="btn btn-danger margin-l10 delete-lang-record" href="' . route('createOctopusOrder', ['id' => $parameters['id'], 'offset' => $parameters['offset']]) . '">' . trans('octopus::pulsar.create_order') . '</a>';

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

        $this->sendRequestEmail($parameters['id'], 'update');
    }

    public function showCustomRecord($parameters)
    {
        $parameters['companies']    = Company::all();
        $parameters['families']     = Family::all();
        $parameters['brands']       = Brand::all();
        $parameters['products']     = Product::builder()->where('brand_072', $parameters['object']->brand_078)->get();

        return $parameters;
    }

    private function sendRequestEmail($id, $action)
    {
        $octopusRequest         = OctopusRequest::builder()->find($id);

        // get notification account
        $notificationsAccount   = Preference::getValue('octopusNotificationsAccount', 8);
        $managerProfile         = Preference::getValue('octopusManagerProfile', 8);
        $emailAccount           = EmailAccount::find($notificationsAccount->value_018);
        $managers               = User::builder()->where('profile_010', $managerProfile->value_018)->where('access_010', true)->get();

        if($emailAccount == null) return null;

        config(['mail.host'         =>  $emailAccount->outgoing_server_013]);
        config(['mail.port'         =>  $emailAccount->outgoing_port_013]);
        config(['mail.from'         =>  ['address' => $emailAccount->email_013, 'name' => $emailAccount->name_013]]);
        config(['mail.encryption'   =>  $emailAccount->outgoing_secure_013 == 'null'? null : $emailAccount->outgoing_secure_013]);
        config(['mail.username'     =>  $emailAccount->outgoing_user_013]);
        config(['mail.password'     =>  Crypt::decrypt($emailAccount->outgoing_pass_013)]);

        $supervisor = User::builder()->find((int)$this->request->input('supervisor'));
        $shop       = Shop::builder()->find($octopusRequest->shop_078);

        // send email to supervisor
        $dataMessage = [
            'emailTo'           => $supervisor->email_010,
            'nameTo'            => $supervisor->name_010 . ' ' . $supervisor->surname_010,
            'subject'           => trans($action == 'update'? 'octopus::pulsar.request_subject_update' : 'octopus::pulsar.request_subject_create', ['id' => $octopusRequest->id_078, 'name' => $supervisor->name_010, 'surname' => $supervisor->surname_010]),
            'octopusRequest'    => $octopusRequest,
            'supervisor'        => $supervisor,
            'shop'              => $shop,
            'actions'           => 'supervisor_request_actions_notification'
        ];

        Mail::send('octopus::emails.request_notification', $dataMessage, function($m) use ($dataMessage) {
            $m->to($dataMessage['emailTo'], $dataMessage['nameTo'])
                ->subject($dataMessage['subject']);
        });

        // send email to manager
        $dataMessage['actions'] = 'manager_request_actions_notification';

        Mail::send('octopus::emails.request_notification', $dataMessage, function($m) use ($dataMessage, $managers) {

            $m->subject($dataMessage['subject']);

            foreach($managers as $manager)
                $m->to($manager->email_010, $manager->name_010 . ' ' . $manager->surname_010);
        });
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

//    public function checkEmail()
//    {
//        $octopusRequest = OctopusRequest::builder()->find(2304);
//        $supervisor     = User::builder()->find($octopusRequest->supervisor_078);
//        $shop           = Shop::builder()->find($octopusRequest->shop_078);
//
//        $dataMessage = [
//            'emailTo'           => $supervisor->email_010,
//            'nameTo'            => $supervisor->name_010 . ' ' . $supervisor->surname_010,
//            'subject'           => 'Solicitud N: ' . $octopusRequest->id_078 . ' insertada por ' . $supervisor->name_010 . ' ' . $supervisor->surname_010,
//            'octopusRequest'    => $octopusRequest,
//            'supervisor'        => $supervisor,
//            'shop'              => $shop,
//            'actions'           => 'supervisor_request_actions_notification'
//        ];
//
//        return view('octopus::emails.request_notification', $dataMessage);
//    }

}