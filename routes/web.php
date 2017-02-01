<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/rooms', 'RoomsController@index')->name('rooms.index');
Route::get('/{id}', 'RoomsController@show')->name('rooms.show');

Route::get('users/{id}', 'UsersController@show')->name('users.show');
