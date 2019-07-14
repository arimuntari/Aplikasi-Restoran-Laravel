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
    return view('login');
});
Route::any('login', 'LoginController@login');


Route::middleware('cek-login')->group(function () {
	Route::get('home', function () {return view('admin.home');});
	Route::get('usermanager/{id}/aktif', 'UsersController@aktif')->name('usermanager.aktif');
	Route::resource('usermanager', 'UsersController');
	Route::get('kategorimenu/{id}/aktif', 'KategorimenuController@aktif')->name('kategorimenu.aktif');
	Route::resource('kategorimenu', 'KategorimenuController');
	Route::get('menu/{id}/aktif', 'MenuController@aktif')->name('MenuController.aktif');
	Route::resource('menu', 'MenuController');
});