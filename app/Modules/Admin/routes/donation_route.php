<?php

/*------------------------------------*/
/*menu */
Route::get('donation/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/index',
    'as' => 'admin.donation.index',
    'uses' => 'DonationController@index'
]);

Route::get('donation/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/create',
    'as' => 'admin.donation.create',
    'uses' => 'DonationController@create'
]);
Route::get('donation/search', [
    'middleware' => 'strim_empty_parem',
    'as' => 'admin.donation.search',
    'uses' => 'DonationController@search'
]);

Route::post('donation/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/store',
    'as' => 'admin.donation.store',
    'uses' => 'DonationController@store'
]);
Route::get('donation/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/show/{id}',
    'as' => 'admin.donation.show',
    'uses' => 'DonationController@show'
]);
Route::get('donation/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/edit/{id}',
    'as' => 'admin.donation.edit',
    'uses' => 'DonationController@edit'
]);


Route::patch('donation/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/update/{id}',
    'as' => 'admin.donation.update',
    'uses' => 'DonationController@update'
]);
Route::get('donation/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/donation/destroy/{id}',
    'as' => 'admin.donation.destroy',
    'uses' => 'DonationController@destroy'
]);