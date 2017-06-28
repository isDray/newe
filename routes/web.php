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

/*
|--------------------------------------------------------------------------
| 2017-06-28 新增權限群組
|--------------------------------------------------------------------------
| 1) / home -> 一開始的面板放個人資訊
| 
| 2) / 
| 
|
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');

});
