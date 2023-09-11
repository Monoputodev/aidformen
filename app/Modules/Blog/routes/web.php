<?php

Route::group(['prefix' => config('global.prefix_name'),'module' => 'Blog', 'middleware' => ['web','adminmiddleware','redirect_if_logout'], 'namespace' => 'App\Modules\Blog\Controllers'], function() {

    //Route::resource('Blog', 'BlogController');

	/*Blog */
	Route::get('post/index', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/index',
		'as' => 'admin.blog.index',
		'uses' => 'BlogController@index'
	]);

	Route::get('post/create', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/create',
		'as' => 'admin.blog.create',
		'uses' => 'BlogController@create'
	]);


	Route::get('post/search', [
		'middleware' => 'strim_empty_parem',
		'as' => 'admin.blog.search',
		'uses' => 'BlogController@search'
	]);


	Route::post('post/store', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/store',
		'as' => 'admin.blog.store',
		'uses' => 'BlogController@store'
	]);
	Route::get('post/show/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/show/{id}',
		'as' => 'admin.blog.show',
		'uses' => 'BlogController@show'
	]);
	Route::get('post/edit/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/edit/{id}',
		'as' => 'admin.blog.edit',
		'uses' => 'BlogController@edit'
	]);

	Route::patch('post/update/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/update/{id}',
		'as' => 'admin.blog.update',
		'uses' => 'BlogController@update'
	]);

	Route::get('post/destroy/{id}', [
    //'middleware' => 'acl_access:'.config('global.prefix_name').'/post/destroy/{id}',
		'as' => 'admin.blog.destroy',
		'uses' => 'BlogController@destroy'
	]);


	Route::post('ckeditor/image_upload', 'BlogController@upload')->name('upload');
});
