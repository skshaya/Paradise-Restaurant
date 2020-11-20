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

Route::get('/', 'orderController@index');
Route::post('/order', 'orderController@order');

Route::post('/signin','authController@signIn');
Route::get('/admin/orders', 'orderController@showOrder')->middleware('auth');
Route::get('/admin/reports', 'orderController@makeReports')->middleware('auth');

Auth::routes();

