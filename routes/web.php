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
Route::any('/test/register','test\TestController@register');
Route::any('/test/do_register','test\TestController@do_register');
Route::any('/test/login','test\LoginController@login');
Route::any('/test/do_login','test\LoginController@do_login');
Route::any('/test/index','test\LoginController@index');
