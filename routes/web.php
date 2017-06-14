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
    return view('upload');
});

Route::get('user', function () {
    return "teste";
});

Route::get('user/profile', 'UserController@showProfile')->name('profile');
Route::post('file/upload', 'UserController@upload')->name('upload');
Route::post('file/save', 'UserController@save')->name('save');