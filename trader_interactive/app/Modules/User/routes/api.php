<?php

Route::group(['module' => 'User', 'middleware' => ['api'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/api/listings', 'ApiListingsController@listings');
    Route::get('/api/listing-details/id={id}', 'ApiListingsController@listingDetails');
    Route::get('/api/search-listing-details/make={make}/model={model}/min_price={min_price}/max_price={max_price}', 'ApiListingsController@searchListingDetails');
    Route::post('/api/create-listings', 'ApiListingsController@createListings');

    Route::get('/api/sellers', 'ApiSellerController@sellers');
    Route::get('/api/seller-details/id={id}', 'ApiSellerController@sellerDetails');
    Route::get('/api/seller-listing-details/id={id}', 'ApiSellerController@sellerListingDetails');
    Route::get('/api/seller-individual-listing-details/id={id}/type={type}', 'ApiSellerController@sellerIndividualListingDetails');
    Route::post('/api/create-sellers', 'ApiSellerController@createSellers');
    Route::post('/api/create-sellers-listings', 'ApiSellerController@createSellersListings');

    Route::post('/api/contact', 'ApiReviewsController@contact');
    Route::get('/api/reviews/id={id}', 'ApiReviewsController@reviews');
    Route::post('/api/create-reviews', 'ApiReviewsController@createReviews');


    Route::get('/api/users', 'ApiUserController@users');
    Route::post('/api/create-users', 'ApiUserController@createUsers');



});
