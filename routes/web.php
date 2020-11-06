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

Auth::routes();

Route::post('/loginAdmin', 'AdminController@adminpostLogin')->name('postlogin');
Route::get('/changePassword', 'AdminController@changePassword')->name('customer.changePassword');
Route::post('/changePassword', 'AdminController@updatePassword')->name('customer.updatePassword');
Route::post('logout', 'AdminController@logout')->name('logout');

