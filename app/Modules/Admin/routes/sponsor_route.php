<?php

/*------------------------------------*/
/*menu */
Route::get('sponsor/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/index',
    'as' => 'admin.sponsor.index',
    'uses' => 'SponsorController@index'
]);

Route::get('sponsor/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/create',
    'as' => 'admin.sponsor.create',
    'uses' => 'SponsorController@create'
]);
Route::get('sponsor/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.sponsor.search',
    'uses' => 'SponsorController@search'
]);

Route::post('sponsor/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/store',
    'as' => 'admin.sponsor.store',
    'uses' => 'SponsorController@store'
]);
Route::get('sponsor/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/show/{id}',
    'as' => 'admin.sponsor.show',
    'uses' => 'SponsorController@show'
]);
Route::get('sponsor/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/edit/{id}',
    'as' => 'admin.sponsor.edit',
    'uses' => 'SponsorController@edit'
]);


Route::patch('sponsor/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/update/{id}',
    'as' => 'admin.sponsor.update',
    'uses' => 'SponsorController@update'
]);
Route::get('sponsor/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/sponsor/destroy/{id}',
    'as' => 'admin.sponsor.destroy',
    'uses' => 'SponsorController@destroy'
]);
