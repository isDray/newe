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
| 2) / account -> 會員列表
| 
|
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');

    Route::get('/account','AccountController@lists');
    Route::get('/account/account_new','AccountController@account_new');
    Route::post('account/account_new_do','AccountController@account_new_do');
    Route::get('/account/account_edit/{id}','AccountController@account_edit');
    Route::post('account/account_edit_do','AccountController@account_edit_do');
    Route::get('/account/account_del/{id}','AccountController@account_del');
});
