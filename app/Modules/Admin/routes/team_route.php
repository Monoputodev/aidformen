<?php

/*------------------------------------*/
/*menu */
Route::get('team/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/index',
    'as' => 'admin.team.index',
    'uses' => 'TeamController@index'
]);

Route::get('team/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/create',
    'as' => 'admin.team.create',
    'uses' => 'TeamController@create'
]);
Route::get('team/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.team.search',
    'uses' => 'TeamController@search'
]);

Route::post('team/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/store',
    'as' => 'admin.team.store',
    'uses' => 'TeamController@store'
]);
Route::get('team/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/show/{id}',
    'as' => 'admin.team.show',
    'uses' => 'TeamController@show'
]);
Route::get('team/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/edit/{id}',
    'as' => 'admin.team.edit',
    'uses' => 'TeamController@edit'
]);


Route::patch('team/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/update/{id}',
    'as' => 'admin.team.update',
    'uses' => 'TeamController@update'
]);
Route::get('team/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/team/destroy/{id}',
    'as' => 'admin.team.destroy',
    'uses' => 'TeamController@destroy'
]);