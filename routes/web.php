<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Pages
Route::get('/', 'pageRoute@index');
Route::get('/contactus', 'pageRoute@contact');
Route::get('/fleet', 'pageRoute@fleet');
Route::get('/offers', 'pageRoute@offers');
Route::get('/team', 'pageRoute@team');
Route::get('/aboutus', 'pageRoute@aboutus');
Route::get('/terms', 'pageRoute@terms');
Route::get('/allbooking','pageRoute@allBooking')->name('allBooking')->middleware('auth');

//All user routes
Route::get('/getAdditionalEquips','bookingController@getAdditionalEquips');
Route::get('/booking','pageRoute@booking')->middleware('auth');
Route::get('/userprofile','userController@getUser')->middleware('auth');
Route::get('/getVehicle/{id}','vehicleController@getVehicle')->middleware('auth');
Route::get('/extendBooking','bookingController@extendBooking')->middleware('auth');
Route::post('/updateUser','userController@updateUser')->middleware('auth');
Route::post('/updateprofileImage','userController@changeProfileImage')->middleware('auth');
Route::post('/checkAvailability','bookingController@checkAvailability')->middleware('auth');
Route::post('/makeBooking','bookingController@makeBooking')->middleware('auth');
Route::post('/makeContact','queryController@makeQuery');
Route::post('/bookingUpdate','bookingController@updateBooking')->middleware('auth');



//Admin routes
Route::get('/adminPanel', 'pageRoute@adminPanel')->name('adminPanel')->middleware(['auth','auth.admin']);
Route::post('/vehicleAction','vehicleController@vehicleAction')->name('vehicleAction')->middleware(['auth','auth.admin']);
Route::post('/addVehicle','vehicleController@addVehicle')->middleware(['auth','auth.admin']);
Route::post('/userAction','adminController@userAction')->name('userAction')->middleware(['auth','auth.admin']);
Route::post('/bookingAction','adminController@bookingAction')->name('bookingAction')->middleware(['auth','auth.admin']);
Route::post('/offerAction','adminController@offerAction')->name('offerAction')->middleware(['auth','auth.admin']);
Route::post('/addOffer','offerController@addOffer')->middleware(['auth','auth.admin']);
Route::get('/scrape','adminController@scrape');
Route::get('/get','adminController@getData');
Route::get('/registerAdmin','PageRoute@registerAdmin');
Route::post('/saveAdmin','adminController@register')->name('adminregister');
Auth::routes();


