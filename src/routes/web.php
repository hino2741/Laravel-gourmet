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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('logout');
    Route::post('/register', 'Admin\Auth\RegisterController@create')->name('admin.register');
    Route::view('/', 'admin')->middleware('auth:admin')->name('admin.home');
    Route::get('/infomation', 'Auth\InfomationController@index')->name('admin.blog.index');
});