<?php

Route::get('media/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/index',
    'as' => 'admin.media.index',
    'uses' => 'MediaController@index'
]);

Route::get('media/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/create',
    'as' => 'admin.media.create',
    'uses' => 'MediaController@create'
]);
Route::get('media/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.media.search',
    'uses' => 'MediaController@search'
]);

Route::post('media/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/store',
    'as' => 'admin.media.store',
    'uses' => 'MediaController@store'
]);
Route::get('media/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/show/{id}',
    'as' => 'admin.media.show',
    'uses' => 'MediaController@show'
]);
Route::get('media/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/edit/{id}',
    'as' => 'admin.media.edit',
    'uses' => 'MediaController@edit'
]);


Route::patch('media/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/update/{id}',
    'as' => 'admin.media.update',
    'uses' => 'MediaController@update'
]);
Route::get('media/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/media/destroy/{id}',
    'as' => 'admin.media.destroy',
    'uses' => 'MediaController@destroy'
]);