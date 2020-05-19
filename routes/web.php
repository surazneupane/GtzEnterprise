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
Route::view('/','landingpage');


Route::group(['prefix' => 'vendor'], function () {
Route::group(['middleware' => 'logincheck'], function () {
Route::view('/signin','vendor.login');
Route::view('/signup','vendor.signup');
Route::post('/signup', 'UserController@store' )->name('vendorsignup');
Route::post('/signin','UserController@logIn')->name('vendorlogin');
});
Route::group(['middleware' => ['vendorcheck','disablebackbutton']], function () {
Route::get('/dashboard','VendorController@index')->name('vendordashboard');
Route::get('/logout','VendorController@logoutVendor')->name('vendorlogout');
Route::resource('product', 'ProductController');
});

});