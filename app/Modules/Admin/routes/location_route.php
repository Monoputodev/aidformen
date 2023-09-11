<?php

/*------------------------------------*/
/*menu */
Route::get('location/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/index',
    'as' => 'admin.location.index',
    'uses' => 'LocationController@index'
]);

Route::get('location/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/create',
    'as' => 'admin.location.create',
    'uses' => 'LocationController@create'
]);
Route::get('location/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.location.search',
    'uses' => 'LocationController@search'
]);

Route::post('location/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/store',
    'as' => 'admin.location.store',
    'uses' => 'LocationController@store'
]);
Route::get('location/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/show/{id}',
    'as' => 'admin.location.show',
    'uses' => 'LocationController@show'
]);
Route::get('location/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/edit/{id}',
    'as' => 'admin.location.edit',
    'uses' => 'LocationController@edit'
]);


Route::patch('location/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/update/{id}',
    'as' => 'admin.location.update',
    'uses' => 'LocationController@update'
]);
Route::get('location/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/location/destroy/{id}',
    'as' => 'admin.location.destroy',
    'uses' => 'LocationController@destroy'
]);