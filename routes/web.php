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


Route::get('/', 'FrontController@index')->name('customer.index');
Route::get('product-detail/{slug}', 'FrontController@product_detail')->name('customer.product_detail');
Route::get('shop-list/{slug}', 'FrontController@shop_list')->name('customer.shop_list');
Route::get('purchase', 'FrontController@purchase')->name('customer.purchase');


Route::get('/customer-login', 'FrontController@login')->name('customer.login');
Route::post('/customer-login', 'CustomerController@customer_login')->name('customer.customer_login');
Route::get('/customer-register', 'FrontController@register')->name('customer.register');
Route::post('/customer-register', 'CustomerController@store')->name('customer.store');
Route::get('/customer-update', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer-update', 'CustomerController@update')->name('customer.update');
Route::get('/changePassword', 'CustomerController@changePassword')->name('customer.changePassword');
Route::post('/changePassword', 'CustomerController@updatePassword')->name('customer.updatePassword');

Route::post('customer_logout', 'CustomerController@customer_logout')->name('customer.customer_logout');


Route::get('product_view', 'FrontController@view')->name('product.view');

Auth::routes();

// Route::get('/admin', 'adminController@admin')->name('admin');
// Route::get('/login', 'CustomerController@admingetLogin')->name('getlogin');
// Route::post('/loginAdmin', 'CustomerController@adminpostLogin')->name('login');

Route::post('/loginAdmin', 'AdminController@adminpostLogin')->name('postlogin');
// Route::get('/changePassword', 'AdminController@changePassword')->name('customer.changePassword');
// Route::post('/changePassword', 'AdminController@updatePassword')->name('customer.updatePassword');
Route::post('logout', 'AdminController@logout')->name('logout');

Route::middleware(['checkacl:admin'], ['auth'])->group(function () {


    Route::get('/home', 'HomeController@index')->name('home');

    // modulle layout
    Route::prefix('layout')->group(function () {
        // carousel
        Route::get('/createCarousel', 'LayoutController@indexCarousel')->name('carousel.index');
        Route::post('/createCarousel', 'LayoutController@storeCarousel')->name('carousel.store');
        Route::get('/deleteCarousel/{id}', 'LayoutController@deleteCarousel')->name('carousel.delete');
    });

    // modulle item
    Route::prefix('item')->group(function () {
        Route::get('/', 'ItemController@index')->name('item.index');
        Route::get('/create', 'ItemController@create')->name('item.add');
        Route::get('/{id}/createCopy', 'ItemController@createCopy')->name('item.list');
        Route::post('/{id}/createCopy', 'ItemController@storeCopy')->name('item.list');
        Route::get('/{id}/createImage', 'ItemController@createImage')->name('item.image');
        Route::post('/{id}/createImage', 'ItemController@storeImage')->name('item.image');
        Route::get('/{id}/deleteImage/{c_id}', 'ItemController@storeImageDelete')->name('item.imagedelete');
        Route::post('/create', 'ItemController@store')->name('item.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });

    // modulle item description
    Route::prefix('item_description')->group(function () {
    	// Danh mục
        Route::get('indexCategory', 'ItemDescriptionController@indexCategory')->name('item_description.indexCategory');
        Route::post('indexCategory', 'ItemDescriptionController@storeCategory')->name('item_description.storeCategory');
        Route::get('/deleteCategory/{id}', 'ItemDescriptionController@deleteCategory')->name('item_description.deleteCategory');
        // Chất liệu
        Route::get('indexComposition', 'ItemDescriptionController@indexComposition')->name('item_description.indexComposition');
        Route::post('indexComposition', 'ItemDescriptionController@storeComposition')->name('item_description.storeComposition');
        Route::get('/deleteComposition/{id}', 'ItemDescriptionController@deleteComposition')->name('item_description.deleteComposition');
        // Phong cách
        Route::get('indexStyle', 'ItemDescriptionController@indexStyle')->name('item_description.indexStyle');
        Route::post('indexStyle', 'ItemDescriptionController@storeStyle')->name('item_description.storeStyle');
        Route::get('/deleteStyle/{id}', 'ItemDescriptionController@deleteStyle')->name('item_description.deleteStyle');
        // Thuộc tính
        Route::get('indexProperty', 'ItemDescriptionController@indexProperty')->name('item_description.indexProperty');
        Route::post('indexProperty', 'ItemDescriptionController@storeProperty')->name('item_description.storeProperty');
        Route::get('/deleteProperty/{id}', 'ItemDescriptionController@deleteProperty')->name('item_description.deleteProperty');
        // Màu
        Route::get('indexColor', 'ItemDescriptionController@indexColor')->name('item_description.indexColor');
        Route::post('indexColor', 'ItemDescriptionController@storeColor')->name('item_description.storeColor');
        Route::get('/deleteColor/{id}', 'ItemDescriptionController@deleteColor')->name('item_description.deleteColor');
        // Kích thước
        Route::get('indexSize', 'ItemDescriptionController@indexSize')->name('item_description.indexSize');
        Route::post('indexSize', 'ItemDescriptionController@storeSize')->name('item_description.storeSize');
        Route::get('/deleteSize/{id}', 'ItemDescriptionController@deleteSize')->name('item_description.deleteSize');
    });


    // modulle gallery
    Route::prefix('gallery')->group(function () {
        Route::get('gallery-index', 'GalleryController@index')->name('gallery.index');
        Route::get('gallery-create', 'GalleryController@create')->name('gallery.create');
        Route::post('gallery-store', 'GalleryController@store')->name('gallery.store');
        Route::get('getLibrary', 'GalleryController@getLibrary')->name('gallery.getLibrary');
    });

    // modulle user
    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.add');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@update')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });
    // module role
    Route::prefix('roles')->group(function () {
        Route::get('/', 'RoleController@index')->name('role.index');
        Route::get('/create', 'RoleController@create')->name('role.add');
        Route::post('/create', 'RoleController@store')->name('role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::post('/edit/{id}', 'RoleController@update')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });
});