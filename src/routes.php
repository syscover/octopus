<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can any all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['middleware' => ['auth.pulsar','permission.pulsar','locale.pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | REQUEST
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/request/{offset?}',                            ['as'=>'OctopusRequest',                   'uses'=>'Syscover\Octopus\Controllers\Requests@index',                     'resource' => 'octopus-request',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/request/modal/{offset}/{modal}',               ['as'=>'modalOctopusRequest',              'uses'=>'Syscover\Octopus\Controllers\Requests@index',                     'resource' => 'octopus-request',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/request/json/data/{modal}',                    ['as'=>'jsonDataOctopusRequest',           'uses'=>'Syscover\Octopus\Controllers\Requests@jsonData',                  'resource' => 'octopus-request',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/request/create/{offset}',                      ['as'=>'createOctopusRequest',             'uses'=>'Syscover\Octopus\Controllers\Requests@createRecord',              'resource' => 'octopus-request',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/request/store/{offset}',                      ['as'=>'storeOctopusRequest',              'uses'=>'Syscover\Octopus\Controllers\Requests@storeRecord',               'resource' => 'octopus-request',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/request/{id}/edit/{offset}',                   ['as'=>'editOctopusRequest',               'uses'=>'Syscover\Octopus\Controllers\Requests@editRecord',                'resource' => 'octopus-request',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/request/update/{id}/{offset}',                 ['as'=>'updateOctopusRequest',             'uses'=>'Syscover\Octopus\Controllers\Requests@updateRecord',              'resource' => 'octopus-request',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/request/delete/{id}/{offset}',                 ['as'=>'deleteOctopusRequest',             'uses'=>'Syscover\Octopus\Controllers\Requests@deleteRecord',              'resource' => 'octopus-request',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/request/delete/select/records',             ['as'=>'deleteSelectOctopusRequest',       'uses'=>'Syscover\Octopus\Controllers\Requests@deleteRecordsSelect',       'resource' => 'octopus-request',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | ADDRESS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/address/{offset?}',                                         ['as'=>'OctopusAddress',                    'uses'=>'Syscover\Octopus\Controllers\Addresses@index',                           'resource' => 'octopus-address',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/address/modal/{ref?}/{offset?}/{modal?}',                   ['as'=>'modalOctopusAddress',               'uses'=>'Syscover\Octopus\Controllers\Addresses@index',                           'resource' => 'octopus-address',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/address/json/data/{ref}/{modal}',                           ['as'=>'jsonDataOctopusAddress',            'uses'=>'Syscover\Octopus\Controllers\Addresses@jsonData',                        'resource' => 'octopus-address',        'action' => 'access']);
    Route::post(config('pulsar.appName') . '/octopus/address/favorite/address/{shop?}',                         ['as'=>'jsonFavoriteAddressOctopusAddress', 'uses'=>'Syscover\Octopus\Controllers\Addresses@jsonFavoriteAddress',             'resource' => 'octopus-address',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/address/create/{ref}/{offset}',                             ['as'=>'createOctopusAddress',              'uses'=>'Syscover\Octopus\Controllers\Addresses@createRecord',                    'resource' => 'octopus-address',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/address/store/{ref}/{offset}',                             ['as'=>'storeOctopusAddress',               'uses'=>'Syscover\Octopus\Controllers\Addresses@storeRecord',                     'resource' => 'octopus-address',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/address/{ref}/{id}/edit/{offset}',                          ['as'=>'editOctopusAddress',                'uses'=>'Syscover\Octopus\Controllers\Addresses@editRecord',                      'resource' => 'octopus-address',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/address/update/{id}/{offset}',                              ['as'=>'updateOctopusAddress',              'uses'=>'Syscover\Octopus\Controllers\Addresses@updateRecord',                    'resource' => 'octopus-address',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/address/delete/{id}/{ref}/{offset}',                        ['as'=>'deleteOctopusAddress',              'uses'=>'Syscover\Octopus\Controllers\Addresses@deleteRecord',                    'resource' => 'octopus-address',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/address/delete/select/records/{ref}/{offset}/{tab}',     ['as'=>'deleteSelectOctopusAddress',        'uses'=>'Syscover\Octopus\Controllers\Addresses@deleteRecordsSelect',             'resource' => 'octopus-address',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | SHOP
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/shop/{offset?}',                                ['as'=>'OctopusShop',                       'uses'=>'Syscover\Octopus\Controllers\Shops@index',                         'resource' => 'octopus-shop',           'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/shop/modal/{offset}/{modal}',                   ['as'=>'modalOctopusShop',                  'uses'=>'Syscover\Octopus\Controllers\Shops@index',                         'resource' => 'octopus-shop',           'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/shop/json/data/{modal}',                        ['as'=>'jsonDataOctopusShop',               'uses'=>'Syscover\Octopus\Controllers\Shops@jsonData',                      'resource' => 'octopus-shop',           'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/shop/create/{offset}',                          ['as'=>'createOctopusShop',                 'uses'=>'Syscover\Octopus\Controllers\Shops@createRecord',                  'resource' => 'octopus-shop',           'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/shop/store/{offset}',                          ['as'=>'storeOctopusShop',                  'uses'=>'Syscover\Octopus\Controllers\Shops@storeRecord',                   'resource' => 'octopus-shop',           'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/shop/{id}/edit/{offset}/{tab}',                 ['as'=>'editOctopusShop',                   'uses'=>'Syscover\Octopus\Controllers\Shops@editRecord',                    'resource' => 'octopus-shop',           'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/shop/update/{id}/{offset}',                     ['as'=>'updateOctopusShop',                 'uses'=>'Syscover\Octopus\Controllers\Shops@updateRecord',                  'resource' => 'octopus-shop',           'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/shop/delete/{id}/{offset}',                     ['as'=>'deleteOctopusShop',                 'uses'=>'Syscover\Octopus\Controllers\Shops@deleteRecord',                  'resource' => 'octopus-shop',           'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/shop/delete/select/records',                 ['as'=>'deleteSelectOctopusShop',           'uses'=>'Syscover\Octopus\Controllers\Shops@deleteRecordsSelect',           'resource' => 'octopus-shop',           'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/customer/{offset?}',                            ['as'=>'OctopusCustomer',                   'uses'=>'Syscover\Octopus\Controllers\Customers@index',                     'resource' => 'octopus-customer',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/customer/modal/{offset}/{modal}',               ['as'=>'modalOctopusCustomer',              'uses'=>'Syscover\Octopus\Controllers\Customers@index',                     'resource' => 'octopus-customer',       'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/customer/json/data/{modal}',                    ['as'=>'jsonDataOctopusCustomer',           'uses'=>'Syscover\Octopus\Controllers\Customers@jsonData',                  'resource' => 'octopus-customer',       'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/customer/create/{offset}',                      ['as'=>'createOctopusCustomer',             'uses'=>'Syscover\Octopus\Controllers\Customers@createRecord',              'resource' => 'octopus-customer',       'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/customer/store/{offset}',                      ['as'=>'storeOctopusCustomer',              'uses'=>'Syscover\Octopus\Controllers\Customers@storeRecord',               'resource' => 'octopus-customer',       'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/customer/{id}/edit/{offset}',                   ['as'=>'editOctopusCustomer',               'uses'=>'Syscover\Octopus\Controllers\Customers@editRecord',                'resource' => 'octopus-customer',       'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/customer/update/{id}/{offset}',                 ['as'=>'updateOctopusCustomer',             'uses'=>'Syscover\Octopus\Controllers\Customers@updateRecord',              'resource' => 'octopus-customer',       'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/customer/delete/{id}/{offset}',                 ['as'=>'deleteOctopusCustomer',             'uses'=>'Syscover\Octopus\Controllers\Customers@deleteRecord',              'resource' => 'octopus-customer',       'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/customer/delete/select/records',             ['as'=>'deleteSelectOctopusCustomer',       'uses'=>'Syscover\Octopus\Controllers\Customers@deleteRecordsSelect',       'resource' => 'octopus-customer',       'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | COMPANY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/company/{offset?}',                             ['as'=>'OctopusCompany',                   'uses'=>'Syscover\Octopus\Controllers\Companies@index',                      'resource' => 'octopus-company',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/company/json/data',                             ['as'=>'jsonDataOctopusCompany',           'uses'=>'Syscover\Octopus\Controllers\Companies@jsonData',                   'resource' => 'octopus-company',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/company/create/{offset}',                       ['as'=>'createOctopusCompany',             'uses'=>'Syscover\Octopus\Controllers\Companies@createRecord',               'resource' => 'octopus-company',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/company/store/{offset}',                       ['as'=>'storeOctopusCompany',              'uses'=>'Syscover\Octopus\Controllers\Companies@storeRecord',                'resource' => 'octopus-company',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/company/{id}/edit/{offset}',                    ['as'=>'editOctopusCompany',               'uses'=>'Syscover\Octopus\Controllers\Companies@editRecord',                 'resource' => 'octopus-company',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/company/update/{id}/{offset}',                  ['as'=>'updateOctopusCompany',             'uses'=>'Syscover\Octopus\Controllers\Companies@updateRecord',               'resource' => 'octopus-company',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/company/delete/{id}/{offset}',                  ['as'=>'deleteOctopusCompany',             'uses'=>'Syscover\Octopus\Controllers\Companies@deleteRecord',               'resource' => 'octopus-company',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/company/delete/select/records',              ['as'=>'deleteSelectOctopusCompany',       'uses'=>'Syscover\Octopus\Controllers\Companies@deleteRecordsSelect',        'resource' => 'octopus-company',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | LABORATORY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/laboratory/{offset?}',                          ['as'=>'OctopusLaboratory',                   'uses'=>'Syscover\Octopus\Controllers\Laboratories@index',                      'resource' => 'octopus-laboratory',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/laboratory/json/data',                          ['as'=>'jsonDataOctopusLaboratory',           'uses'=>'Syscover\Octopus\Controllers\Laboratories@jsonData',                   'resource' => 'octopus-laboratory',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/create/{offset}',                    ['as'=>'createOctopusLaboratory',             'uses'=>'Syscover\Octopus\Controllers\Laboratories@createRecord',               'resource' => 'octopus-laboratory',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/laboratory/store/{offset}',                    ['as'=>'storeOctopusLaboratory',              'uses'=>'Syscover\Octopus\Controllers\Laboratories@storeRecord',                'resource' => 'octopus-laboratory',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/{id}/edit/{offset}',                 ['as'=>'editOctopusLaboratory',               'uses'=>'Syscover\Octopus\Controllers\Laboratories@editRecord',                 'resource' => 'octopus-laboratory',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/laboratory/update/{id}/{offset}',               ['as'=>'updateOctopusLaboratory',             'uses'=>'Syscover\Octopus\Controllers\Laboratories@updateRecord',               'resource' => 'octopus-laboratory',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/laboratory/delete/{id}/{offset}',               ['as'=>'deleteOctopusLaboratory',             'uses'=>'Syscover\Octopus\Controllers\Laboratories@deleteRecord',               'resource' => 'octopus-laboratory',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/laboratory/delete/select/records',           ['as'=>'deleteSelectOctopusLaboratory',       'uses'=>'Syscover\Octopus\Controllers\Laboratories@deleteRecordsSelect',        'resource' => 'octopus-laboratory',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/product/{offset?}',                             ['as'=>'OctopusProduct',                   'uses'=>'Syscover\Octopus\Controllers\Products@index',                      'resource' => 'octopus-product',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/product/json/data',                             ['as'=>'jsonDataOctopusProduct',           'uses'=>'Syscover\Octopus\Controllers\Products@jsonData',                   'resource' => 'octopus-product',        'action' => 'access']);
    Route::post(config('pulsar.appName') . '/octopus/product/brand/{brand?}',                       ['as'=>'jsonBrandProductsOctopusProduct',  'uses'=>'Syscover\Octopus\Controllers\Products@jsonBrandProducts',          'resource' => 'octopus-address',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/product/create/{offset}',                       ['as'=>'createOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\Products@createRecord',               'resource' => 'octopus-product',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/product/store/{offset}',                       ['as'=>'storeOctopusProduct',              'uses'=>'Syscover\Octopus\Controllers\Products@storeRecord',                'resource' => 'octopus-product',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/product/{id}/edit/{offset}',                    ['as'=>'editOctopusProduct',               'uses'=>'Syscover\Octopus\Controllers\Products@editRecord',                 'resource' => 'octopus-product',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/product/update/{id}/{offset}',                  ['as'=>'updateOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\Products@updateRecord',               'resource' => 'octopus-product',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/product/delete/{id}/{offset}',                  ['as'=>'deleteOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\Products@deleteRecord',               'resource' => 'octopus-product',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/product/delete/select/records',              ['as'=>'deleteSelectOctopusProduct',       'uses'=>'Syscover\Octopus\Controllers\Products@deleteRecordsSelect',        'resource' => 'octopus-product',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | BRAND
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/brand/{offset?}',                               ['as'=>'OctopusBrand',                   'uses'=>'Syscover\Octopus\Controllers\Brands@index',                      'resource' => 'octopus-brand',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/brand/json/data',                               ['as'=>'jsonDataOctopusBrand',           'uses'=>'Syscover\Octopus\Controllers\Brands@jsonData',                   'resource' => 'octopus-brand',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/brand/create/{offset}',                         ['as'=>'createOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\Brands@createRecord',               'resource' => 'octopus-brand',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/brand/store/{offset}',                         ['as'=>'storeOctopusBrand',              'uses'=>'Syscover\Octopus\Controllers\Brands@storeRecord',                'resource' => 'octopus-brand',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/brand/{id}/edit/{offset}',                      ['as'=>'editOctopusBrand',               'uses'=>'Syscover\Octopus\Controllers\Brands@editRecord',                 'resource' => 'octopus-brand',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/brand/update/{id}/{offset}',                    ['as'=>'updateOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\Brands@updateRecord',               'resource' => 'octopus-brand',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/brand/delete/{id}/{offset}',                    ['as'=>'deleteOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\Brands@deleteRecord',               'resource' => 'octopus-brand',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/brand/delete/select/records',                ['as'=>'deleteSelectOctopusBrand',       'uses'=>'Syscover\Octopus\Controllers\Brands@deleteRecordsSelect',        'resource' => 'octopus-brand',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/family/{offset?}',                          ['as'=>'OctopusFamily',                   'uses'=>'Syscover\Octopus\Controllers\Families@index',                      'resource' => 'octopus-family',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/family/json/data',                          ['as'=>'jsonDataOctopusFamily',           'uses'=>'Syscover\Octopus\Controllers\Families@jsonData',                   'resource' => 'octopus-family',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/family/create/{offset}',                    ['as'=>'createOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\Families@createRecord',               'resource' => 'octopus-family',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/family/store/{offset}',                    ['as'=>'storeOctopusFamily',              'uses'=>'Syscover\Octopus\Controllers\Families@storeRecord',                'resource' => 'octopus-family',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/family/{id}/edit/{offset}',                 ['as'=>'editOctopusFamily',               'uses'=>'Syscover\Octopus\Controllers\Families@editRecord',                 'resource' => 'octopus-family',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/family/update/{id}/{offset}',               ['as'=>'updateOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\Families@updateRecord',               'resource' => 'octopus-family',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/family/delete/{id}/{offset}',               ['as'=>'deleteOctopusFamily',             'uses'=>'Syscover\Octopus\Controllers\Families@deleteRecord',               'resource' => 'octopus-family',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/family/delete/select/records',           ['as'=>'deleteSelectOctopusFamily',       'uses'=>'Syscover\Octopus\Controllers\Families@deleteRecordsSelect',        'resource' => 'octopus-family',        'action' => 'delete']);
    
});