<?php

Route::group(['module' => 'Admin', 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers'], function() {

    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin', 'AdminController@index');
    Route::get('/admin/listings', 'AdminController@listings');
    Route::get('/admin/listing-details/{id}', 'AdminController@listingDetails');
    Route::get('/admin/seller-car-details/{id}', 'AdminController@sellerCarDetails');
    Route::get('/admin/seller-details/{id}', 'AdminController@sellerDetails');
    Route::get('/admin/seller-motorcycle-details/{id}', 'AdminController@sellerMotorCycleDetails');
    Route::get('/admin/seller-rv-details/{id}', 'AdminController@sellerRvDetails');
    Route::get('/admin/seller-truck-details/{id}', 'AdminController@sellerTruckDetails');
    Route::get('/admin/sellers', 'AdminController@sellers');
    Route::get('/admin/users', 'AdminController@users');
    Route::get('/admin/logout', 'AdminController@logout');

});
