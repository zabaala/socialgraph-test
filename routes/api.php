<?php

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

Route::get('/users', ['uses' => 'Api\UsersController@index']);
Route::get('/users/{user}', ['uses' => 'Api\UsersController@show']);
Route::get('/users/{user}/suggested-countries', ['uses' => 'Api\UsersController@showSuggestedCountries']);
Route::get('/users/{user}/suggested-connections', ['uses' => 'Api\UsersController@showSuggestedConnections']);
Route::get('/users/{user}/connections-of-connections', ['uses' => 'Api\UsersController@showConnectionsOfConnections']);
