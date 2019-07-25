<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth.app']], function () {
    //Route::post('/bot', 'NLPController@NLPTest');
    Route::post('/bot', 'BotController@processChat');
    Route::get('/bot', 'BotController@loadChat');
});

Route::get('/chat', 'NLPController@NLPTest');
Route::get('/format', 'NLPController@formatFile');
Route::get('/image', 'NLPController@imageProcess');

Route::group(['middleware' => ['auth.app', 'auth.role:admin']], function () {
    Route::post('/route', 'RouteController@create');
    Route::patch('/route/{id}', 'RouteController@update');
    Route::delete('/route/{id}', 'RouteController@delete');
    Route::get('/route', 'RouteController@getAll');
    Route::get('/route/{id}', 'RouteController@get');

    Route::get('/vehicle', 'VehicleController@getAll');
});
