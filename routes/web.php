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
Route::get('/onlineshop','CustomerController@index')->name('onlineshop');


//for facebook auth

Route::get('/auth/facebook','UserController@redirectToFacebook')->name('fblogin');
Route::get('/auth/facebook/callback','UserController@handelFacebookCallback');

//for customer
Route::group(['middleware' => 'disablebackbutton'], function () {
    
Route::group(['prefix' => 'customer'], function () {
    Route::get('/logout','CustomerController@logoutCustomer')->name('logoutcust');
    Route::get('/viewcategory/{id}','CustomerController@viewCategoryProducts')->name('viewcategorypro');
    Route::post('/viewcategory','CustomerController@viewCategoryProducts')->name('filtercategorypro');
    Route::get('/viewproduct/{id}','CustomerController@viewSpecificProduct')->name('viewspecificpro');
    Route::group(['middleware' => 'checkcustomer'], function () {
        Route::get('/addToCart/{id}','CartController@addToCart')->name('addtocart');
        Route::get('/checkout','CartController@checkOut')->name('checkout');
        Route::post('/placeorder','CartController@placeOrder')->name('placeorder');
});
});
    
});


//for vendor
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
Route::get('status/{product}','ProductController@makeLiveOrInactive')->name('productstatus');
Route::get('searchproduct','ProductController@searchProduct')->name('productsearch');
Route::get('/orders','VendorController@viewOrders')->name('vieworders');
Route::get('/showorder/{orderid}/{productid}','VendorController@showOrder')->name('viewspecificorder');
Route::get('/rts/{btn}/{orderid}/{productid}','VendorController@orderStatus')->name('RTS');

});

});

//admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['checkadmin','disablebackbutton']], function () {
        Route::get('/dashboard','AdminController@index')->name('admindashboard');
        Route::get('/users','AdminController@showUsers')->name('adminusers');
        Route::get('/categories','AdminController@showCategory')->name('admincategory');
        Route::get('/adminlogout','AdminController@adminLogout')->name('adminlogout');
        Route::post('/addcategory','AdminController@addCategory')->name('addcategory');
        Route::get('/deletecategory/{id}','AdminController@deleteCategory')->name('deletecategory');
        Route::post('/editcategory/{id}','AdminController@editCategory')->name('editcategory');
        Route::get('/banner','AdminController@showBanner')->name('adminbanner');
        Route::post('/addbanner','AdminController@addBanner')->name('addbanner');
        Route::get('/changebannerstats/{id}','AdminController@editBannerStats')->name('changebannerstat');
        Route::get('/deletebanner/{id}','AdminController@deleteBanner')->name('deletebanner');
        Route::get('/vieworders','AdminController@viewOrders')->name('adminvieworders');
    });
   
        




    
});

