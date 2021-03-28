<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('react', function () {
    Alert::toast('Success Toast', 'success');
    return view('test');
});

##################### Home ####################

Route::get('/', 'HomeController@index')->name('LAStore');
Route::get('details', 'HomeController@details');
Route::get('Details/{id}', 'HomeController@get_details')->name('get.details');
Route::get('Search', 'HomeController@search')->name('search');
Route::get('Latest', 'HomeController@latest')->name('latest');
Route::get('Filter/{id}', 'HomeController@get_by_categories')->name('get.categories');
Route::get('Promotions', 'HomeController@get_all_promotion')->name('get.all.promotion');
Route::get('All_Products', 'HomeController@get_all_products')->name('get.all.products');
Route::get('All_Womens_Products', 'HomeController@get_womens_models')->name('get.womens.models');
Route::get('All_Mens_Products', 'HomeController@get_mens_models')->name('get.mens.models');


##################### Wish ####################

Route::get('MyWish', 'WishController@index')->name('my.wish');
Route::delete('delete_MyWish/{id}', 'WishController@destroy')->name('delete.wish');
Route::post('Add_To_Wish', 'WishController@store')->name('add.wish');


##################### Cart #####################

Route::get('Cart', 'CartController@index')->name('cart-index');
Route::post('Savecart', 'CartController@store')->name('Save.cart');
Route::post('deleted/{id}', 'CartController@destroy')->name('deleted.cart');
Route::post('update-cart/{id}', 'CartController@update_cart')->name('updated.cart');


##################### Orders #####################

Route::get('Order/{id}', 'OrderController@index')->name('order.index');
Route::get('Check_Order/{id}', 'OrderController@check_index')->name('order.check');
Route::post('SaveOrder', 'OrderController@store')->name('Save.Order');
Route::post('SaveCheck', 'OrderController@check_store')->name('Save.Check');


##################### Review #####################endregion

Route::get('My_Orders', 'ReviewController@index')->name('myorder.index');
Route::post('Confirm_order/{id}', 'ReviewController@get_review_page')->name('get.review.page');
Route::post('Reviewed', 'ReviewController@store')->name('review.store');


##################### My Acount ###################

route::get('My_Acount/{id}', 'MyacountController@index')->name('My.Acount');
route::post('My_Acount/Updated/{id}', 'MyacountController@update')->name('update.Acount');



##################### Admin Routes #######################endregion

Route::get('Dashboard', 'AdminController@dashboard')->name('Admin/Dashboard');
Route::get('Reviews', 'AdminController@reviews')->name('get.admin.reviews');



############# Product Routes ####################

Route::get('Products-List', 'AdminController@products')->name('get.products');
Route::get('Add-New-Product', 'AdminController@get_product_store')->name('get.store.product');
Route::get('Search-Product', 'AdminController@search_product')->name('search.product');
Route::post('Add-Product', 'AdminController@product_store')->name('store.product');
Route::get('Edit-Product/{id}', 'AdminController@edit_product')->name('edit.product');
Route::post('Update-Product', 'AdminController@update_product')->name('update.product');
Route::post('Delete-Product/{id}', 'AdminController@delete_product')->name('delete.product');
Route::get('Search/Product/', 'AdminController@product_search')->name('search.product');



############# Order Routes #####################

Route::get('Orders', 'AdminController@orders')->name('get.admin.orders');
Route::get('Check-Single-Order', 'AdminController@check_single_order')->name('Check-Single-Order');
Route::get('Search-Check-Order', 'AdminController@search_order_check')->name('search.order.check');
Route::get('Edit-Check-Order/{id}', 'AdminController@edit_check_order')->name('edit.check.order');
Route::post('Update-Check-Order', 'AdminController@update_check_order')->name('update.check.order');
Route::post('Delete-Check-Order/{id}', 'AdminController@delete_check_order')->name('delete.check.order');


############# Multi Order Routes #####################

Route::get('Checks_Orders', 'AdminController@check_orders')->name('get.admin.check_orders');
Route::get('Check-Order', 'AdminController@check_multi_order')->name('check.multi.order');
Route::get('Multi-Command-Products-List/{id}', 'AdminController@get_command_products')->name('get.command.products');
Route::get('Search-Check-Order', 'AdminController@search_mulit_order')->name('search.multi.order');
Route::get('Mulit-Check-Order/{id}', 'AdminController@edit_multi_order')->name('edit.multi.order');
Route::post('Update-Check-Order', 'AdminController@update_multi_order')->name('update.multi.order');
Route::post('Delete-Check-Order/{id}', 'AdminController@delete_multi_order')->name('delete.multi.order');


############### Category Routes #######################

Route::get('Categories', 'AdminController@categories')->name('get.admin.categories');
Route::get('Add-New-Category', 'AdminController@get_store')->name('get.store.cate');
Route::post('Add-Category', 'AdminController@category_store')->name('store.cate');
Route::get('Edit/Category/{id}', 'AdminController@category_edit')->name('edit.categorie');
Route::post('Update/Category', 'AdminController@category_update')->name('update.categorie');
Route::post('Delete/Category', 'AdminController@category_delete')->name('delete.categorie');
Route::get('Search/Category/', 'AdminController@category_search')->name('search.categorie');


############### Cart Routes #######################

Route::get('Carts', 'AdminController@carts')->name('get.admin.carts');
Route::get('Edit/Cart/{id}', 'AdminController@cart_edit')->name('edit.cart');
Route::post('Update/Cart', 'AdminController@cart_update')->name('update.cart');
Route::post('Delete/Cart', 'AdminController@cart_delete')->name('delete.cart');
Route::get('Search/Cart/', 'AdminController@cart_search')->name('search.cart');


############### User Routes #######################

Route::get('Users', 'AdminController@users')->name('get.admin.users');
Route::get('Edit/User/{id}', 'AdminController@user_edit')->name('edit.user');
Route::post('Update/User', 'AdminController@user_update')->name('update.user');
Route::post('Delete/User', 'AdminController@user_delete')->name('delete.user');
Route::get('Search/User', 'AdminController@user_search')->name('search.user');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
