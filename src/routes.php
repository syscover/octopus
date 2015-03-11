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

Route::group(['middleware' => ['auth.pulsar','permission.pulsar']], function() {

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
    Route::any(config('pulsar.appName') . '/octopus/product/{offset?}',                          ['as'=>'OctopusProduct',                   'uses'=>'Syscover\Octopus\Controllers\Products@index',                      'resource' => 'octopus-product',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/product/json/data',                          ['as'=>'jsonDataOctopusProduct',           'uses'=>'Syscover\Octopus\Controllers\Products@jsonData',                   'resource' => 'octopus-product',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/product/create/{offset}',                    ['as'=>'createOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\Products@createRecord',               'resource' => 'octopus-product',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/product/store/{offset}',                    ['as'=>'storeOctopusProduct',              'uses'=>'Syscover\Octopus\Controllers\Products@storeRecord',                'resource' => 'octopus-product',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/product/{id}/edit/{offset}',                 ['as'=>'editOctopusProduct',               'uses'=>'Syscover\Octopus\Controllers\Products@editRecord',                 'resource' => 'octopus-product',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/product/update/{id}/{offset}',               ['as'=>'updateOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\Products@updateRecord',               'resource' => 'octopus-product',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/product/delete/{id}/{offset}',               ['as'=>'deleteOctopusProduct',             'uses'=>'Syscover\Octopus\Controllers\Products@deleteRecord',               'resource' => 'octopus-product',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/product/delete/select/records',           ['as'=>'deleteSelectOctopusProduct',       'uses'=>'Syscover\Octopus\Controllers\Products@deleteRecordsSelect',        'resource' => 'octopus-product',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | BRAND
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/octopus/brand/{offset?}',                          ['as'=>'OctopusBrand',                   'uses'=>'Syscover\Octopus\Controllers\Brands@index',                      'resource' => 'octopus-brand',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/octopus/brand/json/data',                          ['as'=>'jsonDataOctopusBrand',           'uses'=>'Syscover\Octopus\Controllers\Brands@jsonData',                   'resource' => 'octopus-brand',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/octopus/brand/create/{offset}',                    ['as'=>'createOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\Brands@createRecord',               'resource' => 'octopus-brand',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/octopus/brand/store/{offset}',                    ['as'=>'storeOctopusBrand',              'uses'=>'Syscover\Octopus\Controllers\Brands@storeRecord',                'resource' => 'octopus-brand',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/octopus/brand/{id}/edit/{offset}',                 ['as'=>'editOctopusBrand',               'uses'=>'Syscover\Octopus\Controllers\Brands@editRecord',                 'resource' => 'octopus-brand',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/octopus/brand/update/{id}/{offset}',               ['as'=>'updateOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\Brands@updateRecord',               'resource' => 'octopus-brand',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/octopus/brand/delete/{id}/{offset}',               ['as'=>'deleteOctopusBrand',             'uses'=>'Syscover\Octopus\Controllers\Brands@deleteRecord',               'resource' => 'octopus-brand',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/octopus/brand/delete/select/records',           ['as'=>'deleteSelectOctopusBrand',       'uses'=>'Syscover\Octopus\Controllers\Brands@deleteRecordsSelect',        'resource' => 'octopus-brand',        'action' => 'delete']);

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