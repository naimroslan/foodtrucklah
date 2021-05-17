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
Route::get('/check/out', 'CheckOutController@check')->name('check_out');

/* Customer */
Route::get('/register/customer', 'CustomerController@show')->name('sign_up');
Route::post('/register/customer', 'CustomerController@store')->name('store_customer');
Route::get('/shipping', 'CustomerController@shipping');
Route::post('/shipping/store', 'CustomerController@save')->name('store_shipping');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Categories */
Route::get('/category/add','CategoryController@index')->name('show_cate_table');
Route::post('/category/save','CategoryController@save')->name('cate_save');
Route::get('/category/manage','CategoryController@manage')->name('manage_cate');
Route::get('/category/active/{category_id}','CategoryController@active')->name('category_active');
Route::get('/category/inactive/{category_id}','CategoryController@inactive')->name('inactive_cate');

Route::get('/category/delete/{category_id}','CategoryController@delete')->name('cate_delete');

Route::post('/category/update', 'CategoryController@update')->name('cate_update');

/* Rider */
Route::get('/rider/add','riderController@index')->name('show_rider_table');
Route::post('/rider/save','riderController@save_rider')->name('rider_save');
Route::get('/rider/manage','riderController@manage_rider')->name('rider_manage');
Route::get('/rider/active/{rider_id}','riderController@active_rider')->name('rider_active');
Route::get('/rider/inactive/{rider_id}','riderController@inactive_rider')->name('rider_inactive');

Route::get('/rider/delete/{rider_id}','riderController@delete_rider')->name('rider_delete');

Route::post('/rider/update', 'riderController@update_rider')->name('rider_update');

/* Dish */
Route::get('/dish/add','DishController@index')->name('show_dish_table');
Route::post('/dish/save','DishController@save_dish')->name('dish_save');
Route::get('/dish/manage','DishController@manage_dish')->name('dish_manage');
Route::get('/dish/active/{dish_id}','DishController@active_dish')->name('dish_active');
Route::get('/dish/inactive/{dish_id}','DishController@inactive_dish')->name('dish_inactive');

Route::get('/dish/delete/{dish_id}','DishController@delete_dish')->name('dish_delete');

Route::post('/dish/update', 'DishController@update_dish')->name('dish_update');
