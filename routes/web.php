<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','FrontEndController@index');
Route::get('/category/dish/show/{category_id}','FrontEndController@dish_show')->name('category_dish');

/* Cart */
Route::post('/add/cart','cartController@insert')->name('add_to_cart');
Route::get('/cart/show','cartController@show')->name('cart_show');
Route::get('/cart/remove/{rowId}','cartController@remove')->name('remove_item');
Route::post('/cart/update','cartController@update')->name('update_cart');

/* Checkout */
Route::get('/checkout/payment', 'CheckOutController@payment')->name('checkout_payment');
Route::post('/checkout/new/order','CheckOutController@order')->name('new_order');
Route::get('/checkout/order/complete','CheckOutController@complete')->name('order_completed');

//Stripe
Route::get('/stripe-payment','StripeController@handleGet');
Route::post('/stripe-payment','StripeController@handlePost')->name('stripe.payment');

/* Customer */
Route::get('/register/customer', 'CustomerController@show')->name('sign_up');
Route::post('/register/customer', 'CustomerController@store')->name('store_customer');

Route::get('/login/customer', 'CustomerController@login')->name('log_in');
Route::post('/logout/customer', 'CustomerController@logout')->name('log_out');
Route::post('/check/customer/login', 'CustomerController@check')->name('check_login');


Route::get('/shipping', 'CustomerController@shipping');
Route::post('/shipping/store', 'CustomerController@save')->name('store_shipping');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('category')->group(function(){

    /* Categories */
    Route::get('/add','CategoryController@index')->name('show_cate_table');
    Route::post('/save','CategoryController@save')->name('cate_save');
    Route::get('/manage','CategoryController@manage')->name('manage_cate');
    Route::get('/active/{category_id}','CategoryController@active')->name('category_active');
    Route::get('/inactive/{category_id}','CategoryController@inactive')->name('inactive_cate');

    Route::get('/delete/{category_id}','CategoryController@delete')->name('cate_delete');

    Route::post('/update', 'CategoryController@update')->name('cate_update');

});

Route::prefix('rider')->group(function(){

    /* Rider */
    Route::get('/add','riderController@index')->name('show_rider_table');
    Route::post('/save','riderController@save_rider')->name('rider_save');
    Route::get('/manage','riderController@manage_rider')->name('rider_manage');
    Route::get('/active/{rider_id}','riderController@active_rider')->name('rider_active');
    Route::get('/inactive/{rider_id}','riderController@inactive_rider')->name('rider_inactive');

    Route::get('/delete/{rider_id}','riderController@delete_rider')->name('rider_delete');

    Route::post('/update', 'riderController@update_rider')->name('rider_update');

});

Route::prefix('dish')->group(function(){

    /* Dish */
    Route::get('/dish/add','DishController@index')->name('show_dish_table');
    Route::post('/dish/save','DishController@save_dish')->name('dish_save');
    Route::get('/dish/manage','DishController@manage_dish')->name('dish_manage');
    Route::get('/dish/active/{dish_id}','DishController@active_dish')->name('dish_active');
    Route::get('/dish/inactive/{dish_id}','DishController@inactive_dish')->name('dish_inactive');

    Route::get('/dish/delete/{dish_id}','DishController@delete_dish')->name('dish_delete');

    Route::post('/dish/update', 'DishController@update_dish')->name('dish_update');

});

Route::prefix('order')->group(function(){

    /* Order */
    Route::get('/manage','OrderController@manage')->name('show_order');
    Route::get('/view/detail/{order_id}','OrderController@view')->name('view_order');
    Route::get('/view/invoice/{order_id}','OrderController@viewOrderInvoice')->name('view_order_invoice');
    Route::get('/download/invoice/{order_id}','OrderController@downloadInvoice')->name('download_order_invoice');
    Route::get('/delete/{order_id}','OrderController@delete')->name('delete_order');

});
