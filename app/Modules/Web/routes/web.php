<?php

Route::group(['module' => 'Web', 'middleware' => ['web'], 'namespace' => 'App\Modules\Web\Controllers'], function () {

	Route::get('/', 'WebController@index');

	/*all form submit for legal aid*/
	include('aid_route.php');

	Route::get('about/us', [
		'as' => 'web.about.us',
		'uses' => 'WebController@aboutUs'
	]);
	Route::get('become-a-sponsor', [
		'as' => 'web.sponsor',
		'uses' => 'WebController@sponsor'
	]);
	Route::get('proposed-magazine', [
		'as' => 'web.megazine',
		'uses' => 'WebController@megazine'
	]);
	Route::get('contact/us', [
		'as' => 'web.contact',
		'uses' => 'WebController@contact'
	]);

	Route::post('contact/mail/send', [
		'as' => 'contact.mail.submit',
		'uses' => 'WebController@contactMail'
	]);

	Route::get('mission/vision', [
		'as' => 'web.mission',
		'uses' => 'WebController@missionVision'
	]);

	Route::get('our/team', [
		'as' => 'web.team',
		'uses' => 'WebController@ourTeam'
	]);

	Route::get('notice', [
		'as' => 'web.notice',
		'uses' => 'WebController@notice'
	]);

	Route::post('web/subscription', [
		'as' => 'subscription.patch',
		'uses' => 'WebController@subscription'
	]);

	Route::get('faq', [
		'as' => 'web.faq',
		'uses' => 'WebController@faq'
	]);

	Route::get('recent/activity', [
		'as' => 'web.recent.activity',
		'uses' => 'WebController@recentActivity'
	]);


	Route::get('activity/details/{id}/{title}', [
		'as' => 'activity.details',
		'uses' => 'WebController@recentActivityDetails'
	]);

	Route::get('our/news', [
		'as' => 'web.our.news',
		'uses' => 'WebController@ourNews'
	]);

	Route::get('news/details/{id}/{title}', [
		'as' => 'news.details',
		'uses' => 'WebController@ourNewsDetails'
	]);

	Route::get('legal/support', [
		'as' => 'web.legal',
		'uses' => 'WebController@legal'
	]);

	Route::get('legal/{slug}', [
		'as' => 'legal.details',
		'uses' => 'WebController@legalDetails'
	]);

	Route::get('teams', [
		'as' => 'web.team.listing',
		'uses' => 'WebController@teamListing'
	]);
		Route::get('testimonial', [
		'as' => 'web.testimonial.listing',
		'uses' => 'WebController@testimonialListing'
	]);
	Route::get('donations', [
		'as' => 'web.donation.listing',
		'uses' => 'WebController@donationListing'
	]);
	Route::get('locations', [
		'as' => 'web.location.listing',
		'uses' => 'WebController@locationListing'
	]);
	Route::get('video/gallery', [
		'as' => 'web.video.gallery',
		'uses' => 'WebController@videoGallery'
	]);

	Route::get('help/form', [
		'as' => 'web.help.form',
		'uses' => 'WebController@helpform'
	]);

	Route::get('photo/gallery', [
		'as' => 'web.photo.gallery',
		'uses' => 'WebController@photoGallery'
	]);


	Route::get('blog/list', [
		'as' => 'web.blog',
		'uses' => 'WebController@blog'
	]);

	Route::get('blog/details/{id}/{title}', [
		'as' => 'blog.details',
		'uses' => 'WebController@blogDetails'
	]);
});
