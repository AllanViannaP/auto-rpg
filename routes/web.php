<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::get('/', ['uses' => 'HomeController@index',  'as' => 'index']);
Route::get('/home', ['uses' => 'HomeController@index',  'as' => 'index']);
Route::get('/login', ['uses' => 'Auth\LoginController@login',  'as' => 'login']);
Route::post('/login/verify', ['uses' => 'Auth\LoginController@verify_login',  'as' => 'login.verify']);
Route::get('/register', ['uses' => 'RegisterController@register', 'as' => 'register']);
Route::post('/registrate', ['uses' => 'RegisterController@registrate', 'as' => 'registrate']);
Route::get('/usersettings', ['uses' => 'UserController@usersettings', 'as' => 'usersettings']);

//-- Rooms --
Route::get('/mygames', ['uses' => 'RoomController@mygames',  'as' => 'mygames']);
Route::get('/room/{id}', ['uses' => 'RoomController@rooms',  'as' => 'room']);
Route::post('/publish_room', ['uses' => 'RoomController@publish_room', 'as' => 'publish_room']);
Route::get('/join_room', ['uses' => 'RoomController@join_room',  'as' => 'join_room']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('index');
})->name('logout');


