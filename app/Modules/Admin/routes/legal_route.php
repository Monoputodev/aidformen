<?php

/*------------------------------------*/
/*menu */
Route::get('legal/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/index',
    'as' => 'admin.legal.index',
    'uses' => 'LegalController@index'
]);

Route::get('legal/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/create',
    'as' => 'admin.legal.create',
    'uses' => 'LegalController@create'
]);
Route::get('legal/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.legal.search',
    'uses' => 'LegalController@search'
]);

Route::post('legal/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/store',
    'as' => 'admin.legal.store',
    'uses' => 'LegalController@store'
]);
Route::get('legal/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/show/{id}',
    'as' => 'admin.legal.show',
    'uses' => 'LegalController@show'
]);
Route::get('legal/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/edit/{id}',
    'as' => 'admin.legal.edit',
    'uses' => 'LegalController@edit'
]);


Route::patch('legal/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/update/{id}',
    'as' => 'admin.legal.update',
    'uses' => 'LegalController@update'
]);
Route::get('legal/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/legal/destroy/{id}',
    'as' => 'admin.legal.destroy',
    'uses' => 'LegalController@destroy'
]);
