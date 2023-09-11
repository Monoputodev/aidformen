<?php

/*------------------------------------*/
/*menu */
Route::get('client/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/index',
    'as' => 'admin.client.index',
    'uses' => 'ClientController@index'
]);

Route::get('client/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/create',
    'as' => 'admin.client.create',
    'uses' => 'ClientController@create'
]);
Route::get('client/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.client.search',
    'uses' => 'ClientController@search'
]);

Route::post('client/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/store',
    'as' => 'admin.client.store',
    'uses' => 'ClientController@store'
]);
Route::get('client/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/show/{id}',
    'as' => 'admin.client.show',
    'uses' => 'ClientController@show'
]);
Route::get('client/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/edit/{id}',
    'as' => 'admin.client.edit',
    'uses' => 'ClientController@edit'
]);


Route::patch('client/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/update/{id}',
    'as' => 'admin.client.update',
    'uses' => 'ClientController@update'
]);
Route::get('client/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/client/destroy/{id}',
    'as' => 'admin.client.destroy',
    'uses' => 'ClientController@destroy'
]);