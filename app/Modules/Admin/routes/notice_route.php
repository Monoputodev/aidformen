<?php

/*------------------------------------*/
/*menu */
Route::get('notice/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/index',
    'as' => 'admin.notice.index',
    'uses' => 'NoticeController@index'
]);

Route::get('notice/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/create',
    'as' => 'admin.notice.create',
    'uses' => 'NoticeController@create'
]);
Route::get('notice/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.notice.search',
    'uses' => 'NoticeController@search'
]);

Route::post('notice/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/store',
    'as' => 'admin.notice.store',
    'uses' => 'NoticeController@store'
]);
Route::get('notice/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/show/{id}',
    'as' => 'admin.notice.show',
    'uses' => 'NoticeController@show'
]);
Route::get('notice/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/edit/{id}',
    'as' => 'admin.notice.edit',
    'uses' => 'NoticeController@edit'
]);


Route::patch('notice/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/update/{id}',
    'as' => 'admin.notice.update',
    'uses' => 'NoticeController@update'
]);
Route::get('notice/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/notice/destroy/{id}',
    'as' => 'admin.notice.destroy',
    'uses' => 'NoticeController@destroy'
]);