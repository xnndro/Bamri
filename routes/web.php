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

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/','TestQuery@testq');
// bus
Route::get('/bus','BusController@index');
Route::get('/bus/createlink' , 'BusController@createlink');
Route::post('/bus/create','BusController@create');
Route::get('/bus/{id}/edit', 'BusController@edit');
Route::post('/bus/{id}/update', 'BusController@update');
Route::get('/bus/{id}/delete', 'BusController@delete');
Route::get('/bus/export/' , 'BusController@export');

// driver
Route::get('/driver' , 'DriverController@index');
Route::get('/driver/createlink','DriverController@createlink');
Route::post('/driver/create' , 'DriverController@create');
Route::get('/driver/{id}/edit' , 'DriverController@edit');
Route::post('/driver/{id}/update' , 'DriverController@update');
Route::get('/driver/{id}/delete' , 'DriverController@delete');
Route::get('/driver/export/' , 'DriverController@export');

Auth::routes();

// Destroy session
Route::group(['middleware' => ['preventbackbutton','auth']],function(){
Route::get('/home', 'HomeController@index')->name('home');
});
// order
Route::get('/order' , 'OrdersController@index');
Route::get('/order/createlink' ,'OrdersController@createlink');
Route::post('/order/create' , 'OrdersController@create');
Route::get('/order/{id}/edit','OrdersController@edit');
Route::post('/order/{id}/update' ,'OrdersController@update');
Route::get('/order/{id}/delete' , 'OrdersController@delete');
Route::get('/order/export/' , 'OrdersController@export');