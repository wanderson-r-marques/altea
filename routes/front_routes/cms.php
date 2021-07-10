<?php

Route::get('cms/{slug}', 'CmsController@getPage')->name('cms');
Route::get('terms-of-use', 'CmsController@termsOfUse')->name('terms.of.use');
Route::get('contatos', 'ContactController@index')->name('contact.us');
Route::post('contatos', 'ContactController@postContact')->name('contact.us');
Route::get('contact-us-thanks', 'ContactController@thanks')->name('contact.us.thanks');
