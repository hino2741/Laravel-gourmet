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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'Admin\Auth\RegisterController@showRegisterForm')->name('register');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('logout');
    Route::post('/register', 'Admin\Auth\RegisterController@create')->name('register');
    Route::view('/', 'admin')->middleware('auth:admin')->name('home');
    Route::group(['prefix' => 'information', 'as' => 'information.'],function () {
        Route::get('/', 'Admin\InformationController@index')->name('index');
        Route::get('/create', 'Admin\InformationController@create')->name('create');
        Route::post('/', 'Admin\InformationController@store')->name('store');
        Route::get('/{id}/edit', 'Admin\InformationController@edit')->name('edit');
        Route::put('/{id}', 'Admin\InformationController@update')->name('update');
    });
});
