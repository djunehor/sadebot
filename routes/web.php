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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/transport-routes/new', 'FrontController@newRoute')->name('new-route')->middleware('auth');
Route::get('/transport-routes/edit/{id}', 'FrontController@editRoute')->middleware('auth');
Route::get('/transport-routes', 'FrontController@allRoute')->middleware('auth');
