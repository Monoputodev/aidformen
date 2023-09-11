<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {

	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::group(['module' => 'Admin', 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers'], function () {

	//Route::get('/','Auth\LoginController@index');
	Route::get('login', 'Auth\LoginController@index');

	Route::post('do_login', 'Auth\LoginController@post_login');

	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['prefix' => config('global.prefix_name'), 'module' => 'Admin', 'middleware' => ['web', 'redirect_if_logout', 'adminmiddleware'], 'namespace' => 'App\Modules\Admin\Controllers'], function () {

	Route::get('dashboard', 'AdminController@index');
});

Route::group(['prefix' => config('global.prefix_name'), 'module' => 'Admin', 'middleware' => ['web', 'redirect_if_logout', 'adminmiddleware'], 'namespace' => 'App\Modules\Admin\Controllers'], function () {

	include('settings_route.php');
	include('slider_route.php');
	include('faq.php');
	include('testimonial_route.php');
	include('generalpages_route.php');
	include('client_route.php');
	include('team_route.php');
	include('donation_route.php');
	include('location_route.php');
	include('partner_route.php');
	include('sponsor_route.php');
	include('legal_route.php');
	include('notice_route.php');
	include('media_route.php');


	Route::get(
		'general/editor/file',
		[
			'as' => 'admin.general.image',
			'uses' => 'SettingsController@general_file_uploder'
		]
	);


	Route::get(
		'general/editor/delete/{title}',
		[
			'as' => 'admin.general.image.destroy',
			'uses' => 'SettingsController@general_file_uploder_destroy'
		]
	);


	Route::post(
		'general/editor/file/upload',
		[
			'as' => 'admin.general.image.store',
			'uses' => 'SettingsController@general_file_uploder_store'
		]
	);

	//statustic

	Route::get(
		'statustics',
		[
			'as' => 'admin.statustic.index',
			'uses' => 'AdminController@statustic_index'
		]
	);


	Route::patch('statustic/update/{id}', [
		//'middleware' => 'acl_access:'.config('global.prefix_name').'/statustic/update/{id}',
		'as' => 'admin.statustic.update',
		'uses' => 'AdminController@statustic_update'
	]);

	Route::get(
		'forlegalaid',
		[
			'as' => 'admin.forlegalaid.index',
			'uses' => 'AdminController@forlegalaid'
		]
	);
	Route::get(
		'legalaidpanel',
		[
			'as' => 'admin.legalaidpanel.index',
			'uses' => 'AdminController@legalaidpanel'
		]
	);

	Route::get(
		'membership',
		[
			'as' => 'admin.membership.index',
			'uses' => 'AdminController@membership'
		]
	);

	Route::get(
		'membership/print/{id}',
		[
			'as' => 'admin.membership.print',
			'uses' => 'AdminController@membershipPrint'
		]
	);
	Route::get(
		'membership/print/all',
		[
			'as' => 'admin.membership.print.all',
			'uses' => 'AdminController@membershipPrintAll'
		]
	);
	Route::get(
		'membership-view/{id}',
		[
			'as' => 'admin.membership.view',
			'uses' => 'AdminController@membership_view'
		]
	);
});
