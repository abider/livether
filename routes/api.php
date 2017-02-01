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

Route::get('index', 'HomeController@index')->middleware('api');
Route::post('login', 'LoginController@login')->middleware('api');

Route::get('rooms', 'RoomsController@index')->middleware('api');
Route::post('room/followed', 'RoomsController@followed')->middleware('api');
Route::post('room/follow', 'RoomsController@follow')->middleware('auth:api');

Route::get('check', 'UsersController@check')->middleware('api');
Route::get('user/{id}', 'UsersController@show')->middleware('api');
Route::get('user/{id}/following', 'UsersController@following')->middleware('api');
Route::post('user/avatar', 'UsersController@avatar')->middleware('auth:api');

