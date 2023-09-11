<?php 

Route::get('for/legal/aid', [
		'as' => 'web.for.legal.aid',
		'uses' => 'FormController@forLegalAid'
]);

Route::post('for/legal/aid/store', [
		'as' => 'web.for.legal.aid.store',
		'uses' => 'FormController@forLegalAidStore'
]);

Route::get('legal/aid/panel', [
		'as' => 'web.legal.aid.panel',
		'uses' => 'FormController@legalAidPanel'
]);

Route::post('legal/aid/panel/store', [
		'as' => 'web.legal.aid.panel.store',
		'uses' => 'FormController@LegalAidPanelStore'
]);

Route::get('legal/aid/membership', [
		'as' => 'web.legal.aid.membership',
		'uses' => 'FormController@membership'
]);

Route::post('legal/aid/membership/store', [
		'as' => 'web.legal.aid.membership.store',
		'uses' => 'FormController@membershipStore'
]);


?>