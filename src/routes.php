<?php

Route::group(['middleware' => ['web', 'pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | STOCK
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/stock/{offset?}',                            ['as' => 'octopusStock',                      'uses' => 'Syscover\Octopus\Controllers\StockController@index',                     'resource' => 'octopus-stock',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/stock/json/data',                            ['as' => 'jsonDataOctopusStock',              'uses' => 'Syscover\Octopus\Controllers\StockController@jsonData',                  'resource' => 'octopus-stock',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/stock/create/{id}/{offset}',                 ['as' => 'createOctopusStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@createRecord',              'resource' => 'octopus-stock',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/stock/store/{offset}',                      ['as' => 'storeOctopusStock',                 'uses' => 'Syscover\Octopus\Controllers\StockController@storeRecord',               'resource' => 'octopus-stock',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/stock/{id}/edit/{offset}',                   ['as' => 'editOctopusStock',                  'uses' => 'Syscover\Octopus\Controllers\StockController@editRecord',                'resource' => 'octopus-stock',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/stock/update/{id}/{offset}',                 ['as' => 'updateOctopusStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@updateRecord',              'resource' => 'octopus-stock',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/stock/delete/{id}/{offset}',                 ['as' => 'deleteOctopusStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@deleteRecord',              'resource' => 'octopus-stock',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/stock/delete/select/records',             ['as' => 'deleteSelectOctopusStock',          'uses' => 'Syscover\Octopus\Controllers\StockController@deleteRecordsSelect',       'resource' => 'octopus-stock',       'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/octopus/stock/delete/attachment',                   ['as' => 'deleteAttachmentOctopusStock',      'uses' => 'Syscover\Octopus\Controllers\StockController@ajaxDeleteFile',            'resource' => 'octopus-stock',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | SUPERVISOR STOCK
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/supervisor/stock/{offset?}',                            ['as' => 'octopusSupervisorStock',                      'uses' => 'Syscover\Octopus\Controllers\StockController@index',                     'resource' => 'octopus-supervisor-stock',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/supervisor/stock/json/data',                            ['as' => 'jsonDataOctopusSupervisorStock',              'uses' => 'Syscover\Octopus\Controllers\StockController@jsonData',                  'resource' => 'octopus-supervisor-stock',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/stock/create/{id}/{offset}',                 ['as' => 'createOctopusSupervisorStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@createRecord',              'resource' => 'octopus-supervisor-stock',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/supervisor/stock/store/{offset}',                      ['as' => 'storeOctopusSupervisorStock',                 'uses' => 'Syscover\Octopus\Controllers\StockController@storeRecord',               'resource' => 'octopus-supervisor-stock',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/stock/{id}/edit/{offset}',                   ['as' => 'editOctopusSupervisorStock',                  'uses' => 'Syscover\Octopus\Controllers\StockController@editRecord',                'resource' => 'octopus-supervisor-stock',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/supervisor/stock/update/{id}/{offset}',                 ['as' => 'updateOctopusSupervisorStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@updateRecord',              'resource' => 'octopus-supervisor-stock',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/stock/delete/{id}/{offset}',                 ['as' => 'deleteOctopusSupervisorStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@deleteRecord',              'resource' => 'octopus-supervisor-stock',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/supervisor/stock/delete/select/records',             ['as' => 'deleteSelectOctopusSupervisorStock',          'uses' => 'Syscover\Octopus\Controllers\StockController@deleteRecordsSelect',       'resource' => 'octopus-supervisor-stock',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | LABORATORY STOCK
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/laboratory/stock/{offset?}',                            ['as' => 'octopusLaboratoryStock',                      'uses' => 'Syscover\Octopus\Controllers\StockController@index',                     'resource' => 'octopus-laboratory-stock',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/laboratory/stock/json/data',                            ['as' => 'jsonDataOctopusLaboratoryStock',              'uses' => 'Syscover\Octopus\Controllers\StockController@jsonData',                  'resource' => 'octopus-laboratory-stock',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/stock/create/{id}/{offset}',                 ['as' => 'createOctopusLaboratoryStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@createRecord',              'resource' => 'octopus-laboratory-stock',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/laboratory/stock/store/{offset}',                      ['as' => 'storeOctopusLaboratoryStock',                 'uses' => 'Syscover\Octopus\Controllers\StockController@storeRecord',               'resource' => 'octopus-laboratory-stock',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/stock/{id}/edit/{offset}',                   ['as' => 'editOctopusLaboratoryStock',                  'uses' => 'Syscover\Octopus\Controllers\StockController@editRecord',                'resource' => 'octopus-laboratory-stock',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/laboratory/stock/update/{id}/{offset}',                 ['as' => 'updateOctopusLaboratoryStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@updateRecord',              'resource' => 'octopus-laboratory-stock',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/stock/delete/{id}/{offset}',                 ['as' => 'deleteOctopusLaboratoryStock',                'uses' => 'Syscover\Octopus\Controllers\StockController@deleteRecord',              'resource' => 'octopus-laboratory-stock',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/laboratory/stock/delete/select/records',             ['as' => 'deleteSelectOctopusLaboratoryStock',          'uses' => 'Syscover\Octopus\Controllers\StockController@deleteRecordsSelect',       'resource' => 'octopus-laboratory-stock',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | ORDER
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/order/{offset?}',                            ['as' => 'octopusOrder',                      'uses' => 'Syscover\Octopus\Controllers\OrderController@index',                     'resource' => 'octopus-order',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/order/json/data',                            ['as' => 'jsonDataOctopusOrder',              'uses' => 'Syscover\Octopus\Controllers\OrderController@jsonData',                  'resource' => 'octopus-order',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/order/create/{id}/{offset}',                 ['as' => 'createOctopusOrder',                'uses' => 'Syscover\Octopus\Controllers\OrderController@createRecord',              'resource' => 'octopus-order',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/order/store/{offset}',                      ['as' => 'storeOctopusOrder',                 'uses' => 'Syscover\Octopus\Controllers\OrderController@storeRecord',               'resource' => 'octopus-order',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/order/{id}/edit/{offset}',                   ['as' => 'editOctopusOrder',                  'uses' => 'Syscover\Octopus\Controllers\OrderController@editRecord',                'resource' => 'octopus-order',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/order/update/{id}/{offset}',                 ['as' => 'updateOctopusOrder',                'uses' => 'Syscover\Octopus\Controllers\OrderController@updateRecord',              'resource' => 'octopus-order',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/order/delete/{id}/{offset}',                 ['as' => 'deleteOctopusOrder',                'uses' => 'Syscover\Octopus\Controllers\OrderController@deleteRecord',              'resource' => 'octopus-order',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/order/delete/select/records',             ['as' => 'deleteSelectOctopusOrder',          'uses' => 'Syscover\Octopus\Controllers\OrderController@deleteRecordsSelect',       'resource' => 'octopus-order',       'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/octopus/order/delete/attachment',                   ['as' => 'deleteAttachmentOctopusOrder',      'uses' => 'Syscover\Octopus\Controllers\OrderController@ajaxDeleteFile',            'resource' => 'octopus-order',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | ORDER LABORATORY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/laboratory/order/{offset?}',                            ['as' => 'octopusLaboratoryOrder',                      'uses' => 'Syscover\Octopus\Controllers\OrderController@index',                     'resource' => 'octopus-laboratory-order',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/laboratory/order/json/data',                            ['as' => 'jsonDataOctopusLaboratoryOrder',              'uses' => 'Syscover\Octopus\Controllers\OrderController@jsonData',                  'resource' => 'octopus-laboratory-order',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/order/create/{id}/{offset}',                 ['as' => 'createOctopusLaboratoryOrder',                'uses' => 'Syscover\Octopus\Controllers\OrderController@createRecord',              'resource' => 'octopus-laboratory-order',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/laboratory/order/store/{offset}',                      ['as' => 'storeOctopusLaboratoryOrder',                 'uses' => 'Syscover\Octopus\Controllers\OrderController@storeRecord',               'resource' => 'octopus-laboratory-order',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/order/{id}/edit/{offset}',                   ['as' => 'editOctopusLaboratoryOrder',                  'uses' => 'Syscover\Octopus\Controllers\OrderController@editRecord',                'resource' => 'octopus-laboratory-order',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/laboratory/order/update/{id}/{offset}',                 ['as' => 'updateOctopusLaboratoryOrder',                'uses' => 'Syscover\Octopus\Controllers\OrderController@updateRecord',              'resource' => 'octopus-laboratory-order',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/order/delete/{id}/{offset}',                 ['as' => 'deleteOctopusLaboratoryOrder',                'uses' => 'Syscover\Octopus\Controllers\OrderController@deleteRecord',              'resource' => 'octopus-laboratory-order',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/laboratory/order/delete/select/records',             ['as' => 'deleteSelectOctopusLaboratoryOrder',          'uses' => 'Syscover\Octopus\Controllers\OrderController@deleteRecordsSelect',       'resource' => 'octopus-laboratory-order',       'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/octopus/laboratory/order/delete/attachment',                   ['as' => 'deleteAttachmentOctopusLaboratoryOrder',      'uses' => 'Syscover\Octopus\Controllers\OrderController@ajaxDeleteFile',            'resource' => 'octopus-laboratory-order',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | REQUEST
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/request/{offset?}',                             ['as' => 'octopusRequest',                      'uses' => 'Syscover\Octopus\Controllers\RequestController@index',                           'resource' => 'octopus-request',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/request/json/data',                             ['as' => 'jsonDataOctopusRequest',              'uses' => 'Syscover\Octopus\Controllers\RequestController@jsonData',                        'resource' => 'octopus-request',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/request/create/{offset}',                       ['as' => 'createOctopusRequest',                'uses' => 'Syscover\Octopus\Controllers\RequestController@createRecord',                    'resource' => 'octopus-request',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/request/create/from/stock/{stock}/{offset}',    ['as' => 'createOctopusRequestFromStock',       'uses' => 'Syscover\Octopus\Controllers\RequestController@createRecord',                    'resource' => 'octopus-request',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/request/store/{offset}',                       ['as' => 'storeOctopusRequest',                 'uses' => 'Syscover\Octopus\Controllers\RequestController@storeRecord',                     'resource' => 'octopus-request',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/request/{id}/edit/{offset}',                    ['as' => 'editOctopusRequest',                  'uses' => 'Syscover\Octopus\Controllers\RequestController@editRecord',                      'resource' => 'octopus-request',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/request/update/{id}/{offset}',                  ['as' => 'updateOctopusRequest',                'uses' => 'Syscover\Octopus\Controllers\RequestController@updateRecord',                    'resource' => 'octopus-request',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/request/delete/{id}/{offset}',                  ['as' => 'deleteOctopusRequest',                'uses' => 'Syscover\Octopus\Controllers\RequestController@deleteRecord',                    'resource' => 'octopus-request',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/request/delete/select/records',              ['as' => 'deleteSelectOctopusRequest',          'uses' => 'Syscover\Octopus\Controllers\RequestController@deleteRecordsSelect',             'resource' => 'octopus-request',       'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/octopus/request/delete/attachment',                    ['as' => 'deleteAttachmentOctopusRequest',      'uses' => 'Syscover\Octopus\Controllers\RequestController@ajaxDeleteFile',                  'resource' => 'octopus-request',       'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/octopus/request/{id}/show/{offset}',                    ['as' => 'showOctopusRequest',                  'uses' => 'Syscover\Octopus\Controllers\RequestController@showRecord',                      'resource' => 'octopus-request',       'action' => 'access']);

    Route::get(config('pulsar.appName') . '/octopus/request/check/email',                           ['as' => 'checkEmailOctopusRequest',            'uses' => 'Syscover\Octopus\Controllers\RequestController@checkEmail',                  'resource' => 'octopus-request',       'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | SUPERVISOR REQUEST
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/supervisor/request/{offset?}',                            ['as' => 'octopusSupervisorRequest',                   'uses' => 'Syscover\Octopus\Controllers\RequestController@index',                           'resource' => 'octopus-supervisor-request',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/supervisor/request/json/data',                            ['as' => 'jsonDataOctopusSupervisorRequest',           'uses' => 'Syscover\Octopus\Controllers\RequestController@jsonData',                        'resource' => 'octopus-supervisor-request',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/request/create/{offset}',                      ['as' => 'createOctopusSupervisorRequest',             'uses' => 'Syscover\Octopus\Controllers\RequestController@createRecord',                    'resource' => 'octopus-supervisor-request',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/request/create/from/stock/{stock}/{offset}',   ['as' => 'createOctopusSupervisorRequestFromStock',    'uses' => 'Syscover\Octopus\Controllers\RequestController@createRecord',                    'resource' => 'octopus-supervisor-request',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/supervisor/request/store/{offset}',                      ['as' => 'storeOctopusSupervisorRequest',              'uses' => 'Syscover\Octopus\Controllers\RequestController@storeRecord',                     'resource' => 'octopus-supervisor-request',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/request/{id}/edit/{offset}',                   ['as' => 'editOctopusSupervisorRequest',               'uses' => 'Syscover\Octopus\Controllers\RequestController@editRecord',                      'resource' => 'octopus-supervisor-request',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/supervisor/request/update/{id}/{offset}',                 ['as' => 'updateOctopusSupervisorRequest',             'uses' => 'Syscover\Octopus\Controllers\RequestController@updateRecord',                    'resource' => 'octopus-supervisor-request',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/request/delete/{id}/{offset}',                 ['as' => 'deleteOctopusSupervisorRequest',             'uses' => 'Syscover\Octopus\Controllers\RequestController@deleteRecord',                    'resource' => 'octopus-supervisor-request',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/supervisor/request/delete/select/records',             ['as' => 'deleteSelectOctopusSupervisorRequest',       'uses' => 'Syscover\Octopus\Controllers\RequestController@deleteRecordsSelect',             'resource' => 'octopus-supervisor-request',       'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/octopus/supervisor/request/{id}/show/{offset}',                   ['as' => 'showOctopusSupervisorRequest',               'uses' => 'Syscover\Octopus\Controllers\RequestController@showRecord',                      'resource' => 'octopus-supervisor-request',       'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | ADDRESS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/address/{ref}/{modal}/{modalShopView}/{redirectParentJs}/{offset?}',                ['as'=>'octopusAddress',                    'uses'=>'Syscover\Octopus\Controllers\AddressController@index',                           'resource' => 'octopus-address',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/address/json/data/{ref}/{modal}/{modalShopView}/{redirectParentJs}',                ['as'=>'jsonDataOctopusAddress',            'uses'=>'Syscover\Octopus\Controllers\AddressController@jsonData',                        'resource' => 'octopus-address',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/address/create/{ref}/{offset}/{modal}/{modalShopView}/{redirectParentJs}',          ['as'=>'createOctopusAddress',              'uses'=>'Syscover\Octopus\Controllers\AddressController@createRecord',                    'resource' => 'octopus-address',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/address/store/{ref}/{offset}/{modal}/{modalShopView}/{redirectParentJs}',          ['as'=>'storeOctopusAddress',               'uses'=>'Syscover\Octopus\Controllers\AddressController@storeRecord',                     'resource' => 'octopus-address',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/address/{ref}/{id}/edit/{offset}/{modal}/{modalShopView}/{redirectParentJs}',       ['as'=>'editOctopusAddress',                'uses'=>'Syscover\Octopus\Controllers\AddressController@editRecord',                      'resource' => 'octopus-address',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/address/update/{ref}/{id}/{offset}/{modal}/{modalShopView}/{redirectParentJs}',     ['as'=>'updateOctopusAddress',              'uses'=>'Syscover\Octopus\Controllers\AddressController@updateRecord',                    'resource' => 'octopus-address',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/address/delete/{id}/{ref}/{offset}/{modal}/{modalShopView}/{redirectParentJs}',     ['as'=>'deleteOctopusAddress',              'uses'=>'Syscover\Octopus\Controllers\AddressController@deleteRecord',                    'resource' => 'octopus-address',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/address/delete/select/records/{ref}/{offset}',                                   ['as'=>'deleteSelectOctopusAddress',        'uses'=>'Syscover\Octopus\Controllers\AddressController@deleteRecordsSelect',             'resource' => 'octopus-address',        'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/octopus/address/favorite/address/{shop?}',                                                 ['as'=>'jsonFavoriteAddressOctopusAddress', 'uses'=>'Syscover\Octopus\Controllers\AddressController@jsonFavoriteAddress',             'resource' => 'octopus-address',        'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | SHOP
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/shop/{modal}/{offset?}',                    ['as'=>'octopusShop',                       'uses'=>'Syscover\Octopus\Controllers\ShopController@index',                         'resource' => 'octopus-shop',           'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/shop/json/data/{modal}',                    ['as'=>'jsonDataOctopusShop',               'uses'=>'Syscover\Octopus\Controllers\ShopController@jsonData',                      'resource' => 'octopus-shop',           'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/shop/create/{offset}/{modal}',              ['as'=>'createOctopusShop',                 'uses'=>'Syscover\Octopus\Controllers\ShopController@createRecord',                  'resource' => 'octopus-shop',           'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/shop/store/{offset}/{modal}',              ['as'=>'storeOctopusShop',                  'uses'=>'Syscover\Octopus\Controllers\ShopController@storeRecord',                   'resource' => 'octopus-shop',           'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/shop/{id}/edit/{offset}/{tab}/{modal}',     ['as'=>'editOctopusShop',                   'uses'=>'Syscover\Octopus\Controllers\ShopController@editRecord',                    'resource' => 'octopus-shop',           'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/shop/update/{id}/{offset}/{tab}/{modal}',   ['as'=>'updateOctopusShop',                 'uses'=>'Syscover\Octopus\Controllers\ShopController@updateRecord',                  'resource' => 'octopus-shop',           'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/shop/delete/{id}/{offset}/{modal}',         ['as'=>'deleteOctopusShop',                 'uses'=>'Syscover\Octopus\Controllers\ShopController@deleteRecord',                  'resource' => 'octopus-shop',           'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/shop/delete/select/records/{modal}',     ['as'=>'deleteSelectOctopusShop',           'uses'=>'Syscover\Octopus\Controllers\ShopController@deleteRecordsSelect',           'resource' => 'octopus-shop',           'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/customer/{modal}/{offset?}',                   ['as'=>'octopusCustomer',                   'uses'=>'Syscover\Octopus\Controllers\CustomerController@index',                     'resource' => 'octopus-customer',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/customer/json/data/{modal}',                   ['as'=>'jsonDataOctopusCustomer',           'uses'=>'Syscover\Octopus\Controllers\CustomerController@jsonData',                  'resource' => 'octopus-customer',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/customer/create/{offset}/{modal}',             ['as'=>'createOctopusCustomer',             'uses'=>'Syscover\Octopus\Controllers\CustomerController@createRecord',              'resource' => 'octopus-customer',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/customer/store/{offset}/{modal}',             ['as'=>'storeOctopusCustomer',              'uses'=>'Syscover\Octopus\Controllers\CustomerController@storeRecord',               'resource' => 'octopus-customer',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/customer/{id}/edit/{offset}/{modal}',          ['as'=>'editOctopusCustomer',               'uses'=>'Syscover\Octopus\Controllers\CustomerController@editRecord',                'resource' => 'octopus-customer',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/customer/update/{id}/{offset}/{modal}',        ['as'=>'updateOctopusCustomer',             'uses'=>'Syscover\Octopus\Controllers\CustomerController@updateRecord',              'resource' => 'octopus-customer',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/customer/delete/{id}/{offset}/{modal}',        ['as'=>'deleteOctopusCustomer',             'uses'=>'Syscover\Octopus\Controllers\CustomerController@deleteRecord',              'resource' => 'octopus-customer',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/customer/delete/select/records/{modal}',    ['as'=>'deleteSelectOctopusCustomer',       'uses'=>'Syscover\Octopus\Controllers\CustomerController@deleteRecordsSelect',       'resource' => 'octopus-customer',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | COMPANY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/company/{offset?}',                             ['as'=>'octopusCompany',                   'uses'=>'Syscover\Octopus\Controllers\CompanyController@index',                      'resource' => 'octopus-company',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/company/json/data',                             ['as'=>'jsonDataOctopusCompany',           'uses'=>'Syscover\Octopus\Controllers\CompanyController@jsonData',                   'resource' => 'octopus-company',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/company/create/{offset}',                       ['as'=>'createOctopusCompany',             'uses'=>'Syscover\Octopus\Controllers\CompanyController@createRecord',               'resource' => 'octopus-company',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/company/store/{offset}',                       ['as'=>'storeOctopusCompany',              'uses'=>'Syscover\Octopus\Controllers\CompanyController@storeRecord',                'resource' => 'octopus-company',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/company/{id}/edit/{offset}',                    ['as'=>'editOctopusCompany',               'uses'=>'Syscover\Octopus\Controllers\CompanyController@editRecord',                 'resource' => 'octopus-company',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/company/update/{id}/{offset}',                  ['as'=>'updateOctopusCompany',             'uses'=>'Syscover\Octopus\Controllers\CompanyController@updateRecord',               'resource' => 'octopus-company',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/company/delete/{id}/{offset}',                  ['as'=>'deleteOctopusCompany',             'uses'=>'Syscover\Octopus\Controllers\CompanyController@deleteRecord',               'resource' => 'octopus-company',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/company/delete/select/records',              ['as'=>'deleteSelectOctopusCompany',       'uses'=>'Syscover\Octopus\Controllers\CompanyController@deleteRecordsSelect',        'resource' => 'octopus-company',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | LABORATORY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/laboratory/{offset?}',                          ['as'=>'octopusLaboratory',                   'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@index',                      'resource' => 'octopus-laboratory',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/laboratory/json/data',                          ['as'=>'jsonDataOctopusLaboratory',           'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@jsonData',                   'resource' => 'octopus-laboratory',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/create/{offset}',                    ['as'=>'createOctopusLaboratory',             'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@createRecord',               'resource' => 'octopus-laboratory',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/laboratory/store/{offset}',                    ['as'=>'storeOctopusLaboratory',              'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@storeRecord',                'resource' => 'octopus-laboratory',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/{id}/edit/{offset}',                 ['as'=>'editOctopusLaboratory',               'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@editRecord',                 'resource' => 'octopus-laboratory',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/laboratory/update/{id}/{offset}',               ['as'=>'updateOctopusLaboratory',             'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@updateRecord',               'resource' => 'octopus-laboratory',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/delete/{id}/{offset}',               ['as'=>'deleteOctopusLaboratory',             'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@deleteRecord',               'resource' => 'octopus-laboratory',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/laboratory/delete/select/records',           ['as'=>'deleteSelectOctopusLaboratory',       'uses'=>'Syscover\Octopus\Controllers\LaboratoryController@deleteRecordsSelect',        'resource' => 'octopus-laboratory',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/product/{offset?}',                             ['as'=>'octopusProduct',                   'uses'=>'Syscover\Octopus\Controllers\ProductController@index',                      'resource' => 'octopus-product',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/product/json/data',                             ['as'=>'jsonDataOctopusProduct',           'uses'=>'Syscover\Octopus\Controllers\ProductController@jsonData',                   'resource' => 'octopus-product',        'action' => 'access']);
    Route::post(config('pulsar.appName') . '/octopus/product/brand/{brand?}',                       ['as'=>'jsonBrandProductsOctopusProduct',  'uses'=>'Syscover\Octopus\Controllers\ProductController@jsonBrandProducts',          'resource' => 'octopus-address',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/product/create/{offset}',                       ['as'=>'createOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\ProductController@createRecord',               'resource' => 'octopus-product',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/product/store/{offset}',                       ['as'=>'storeOctopusProduct',              'uses'=>'Syscover\Octopus\Controllers\ProductController@storeRecord',                'resource' => 'octopus-product',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/product/{id}/edit/{offset}',                    ['as'=>'editOctopusProduct',               'uses'=>'Syscover\Octopus\Controllers\ProductController@editRecord',                 'resource' => 'octopus-product',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/product/update/{id}/{offset}',                  ['as'=>'updateOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\ProductController@updateRecord',               'resource' => 'octopus-product',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/product/delete/{id}/{offset}',                  ['as'=>'deleteOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\ProductController@deleteRecord',               'resource' => 'octopus-product',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/product/delete/select/records',              ['as'=>'deleteSelectOctopusProduct',       'uses'=>'Syscover\Octopus\Controllers\ProductController@deleteRecordsSelect',        'resource' => 'octopus-product',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | BRAND
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/brand/{offset?}',                               ['as'=>'octopusBrand',                   'uses'=>'Syscover\Octopus\Controllers\BrandController@index',                      'resource' => 'octopus-brand',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/brand/json/data',                               ['as'=>'jsonDataOctopusBrand',           'uses'=>'Syscover\Octopus\Controllers\BrandController@jsonData',                   'resource' => 'octopus-brand',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/brand/create/{offset}',                         ['as'=>'createOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\BrandController@createRecord',               'resource' => 'octopus-brand',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/brand/store/{offset}',                         ['as'=>'storeOctopusBrand',              'uses'=>'Syscover\Octopus\Controllers\BrandController@storeRecord',                'resource' => 'octopus-brand',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/brand/{id}/edit/{offset}',                      ['as'=>'editOctopusBrand',               'uses'=>'Syscover\Octopus\Controllers\BrandController@editRecord',                 'resource' => 'octopus-brand',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/brand/update/{id}/{offset}',                    ['as'=>'updateOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\BrandController@updateRecord',               'resource' => 'octopus-brand',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/brand/delete/{id}/{offset}',                    ['as'=>'deleteOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\BrandController@deleteRecord',               'resource' => 'octopus-brand',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/brand/delete/select/records',                ['as'=>'deleteSelectOctopusBrand',       'uses'=>'Syscover\Octopus\Controllers\BrandController@deleteRecordsSelect',        'resource' => 'octopus-brand',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/family/{offset?}',                          ['as'=>'octopusFamily',                   'uses'=>'Syscover\Octopus\Controllers\FamilyController@index',                      'resource' => 'octopus-family',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/family/json/data',                          ['as'=>'jsonDataOctopusFamily',           'uses'=>'Syscover\Octopus\Controllers\FamilyController@jsonData',                   'resource' => 'octopus-family',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/family/create/{offset}',                    ['as'=>'createOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\FamilyController@createRecord',               'resource' => 'octopus-family',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/family/store/{offset}',                    ['as'=>'storeOctopusFamily',              'uses'=>'Syscover\Octopus\Controllers\FamilyController@storeRecord',                'resource' => 'octopus-family',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/family/{id}/edit/{offset}',                 ['as'=>'editOctopusFamily',               'uses'=>'Syscover\Octopus\Controllers\FamilyController@editRecord',                 'resource' => 'octopus-family',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/family/update/{id}/{offset}',               ['as'=>'updateOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\FamilyController@updateRecord',               'resource' => 'octopus-family',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/family/delete/{id}/{offset}',               ['as'=>'deleteOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\FamilyController@deleteRecord',               'resource' => 'octopus-family',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/family/delete/select/records',           ['as'=>'deleteSelectOctopusFamily',       'uses'=>'Syscover\Octopus\Controllers\FamilyController@deleteRecordsSelect',        'resource' => 'octopus-family',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | PREFERENCES
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/preferences',                             ['as'=>'octopusPreference',               'uses'=>'Syscover\Octopus\Controllers\PreferenceController@index',             'resource' => 'octopus-preference',     'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/preferences/update',                      ['as'=>'updateOctopusPreference',         'uses'=>'Syscover\Octopus\Controllers\PreferenceController@updateRecord',      'resource' => 'octopus-preference',     'action' => 'edit']);
});