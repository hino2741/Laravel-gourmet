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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'Admin\Auth\RegisterController@showRegisterForm')->name('register');
    Route::post('/login', 'Admin\Auth\LoginController@Login');
    Route::post('/register', 'Admin\Auth\RegisterController@create')->name('register');
    Route::view('/', 'admin')->middleware('auth:admin')->name('home');
    Route::get('/infomation', 'Auth\InfomationController@index')->name('blog.index');
});