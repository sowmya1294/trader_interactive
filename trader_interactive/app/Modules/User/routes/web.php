<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/', 'UserController@index');
    Route::post('/', 'UserController@index');
    Route::get('/enquiry/{id}', 'UserController@enquiry');
    Route::post('/contact', 'UserController@contact');
    Route::get('/contact', 'UserController@contact');
    Route::get('/listings', 'UserController@listings');
    Route::post('/listings', 'UserController@listings');
    Route::get('/listing-details/{id}', 'UserController@listingDetails');
    Route::get('/logout', 'UserController@logout');

});
