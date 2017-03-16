<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('manage-hotels', 'ManageHotelsController');
//Route::resource('hotel-facility', 'HotelFacilityController');

//Manage hotel facilities 
Route::get('manage-hotels/{hotel_id}/hotel-facilities', ['uses' => 'HotelFacilityController@index', 'as' => 'hotel.facilities']);
Route::post('add-hotel-facility/{hotel_id}', ['uses' => 'HotelFacilityController@store', 'as' => 'hotel.facilities.store']);

//upload iamges
Route::get('manage-hotels/{hotel_id}/upload-images', ['uses' => 'UploadImagesController@index', 'as' => 'manage-hotels.upload-images.index']);
Route::post('add-hotel-images/{hotel_id}', ['uses' => 'UploadImagesController@store', 'as' => 'hotel.images.store']);

//Hote rating 
Route::get('manage-hotels/{hotel_id}/hotel-rating', ['uses' => 'ManageHotelsController@addHotelRating', 'as' => 'hotel.rating']);
Route::post('store-rating/{hotel_id}', ['uses' => 'ManageHotelsController@storeHotelRating', 'as' => 'hotel.rating.storeRating']);
Route::put('update-rating/{hotel_id}/update/{id}', ['uses' => 'ManageHotelsController@updateHotelRating', 'as' => 'hotel.rating.updateRating']);