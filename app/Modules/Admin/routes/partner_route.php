<?php

/*------------------------------------*/
/*menu */
Route::get('partner/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/index',
    'as' => 'admin.partner.index',
    'uses' => 'PartnerController@index'
]);

Route::get('partner/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/create',
    'as' => 'admin.partner.create',
    'uses' => 'PartnerController@create'
]);
Route::get('partner/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.partner.search',
    'uses' => 'PartnerController@search'
]);

Route::post('partner/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/store',
    'as' => 'admin.partner.store',
    'uses' => 'PartnerController@store'
]);
Route::get('partner/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/show/{id}',
    'as' => 'admin.partner.show',
    'uses' => 'PartnerController@show'
]);
Route::get('partner/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/edit/{id}',
    'as' => 'admin.partner.edit',
    'uses' => 'PartnerController@edit'
]);


Route::patch('partner/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/update/{id}',
    'as' => 'admin.partner.update',
    'uses' => 'PartnerController@update'
]);
Route::get('partner/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/partner/destroy/{id}',
    'as' => 'admin.partner.destroy',
    'uses' => 'PartnerController@destroy'
]);
