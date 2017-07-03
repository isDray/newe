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
    
    ## 帳號區塊
    Route::get('/account','AccountController@lists');
    Route::get('/account/account_new','AccountController@account_new');
    Route::post('account/account_new_do','AccountController@account_new_do');
    Route::get('/account/account_edit/{id}','AccountController@account_edit');
    Route::post('account/account_edit_do','AccountController@account_edit_do');
    Route::get('/account/account_del/{id}','AccountController@account_del');

    ## 功能區塊
    Route::get('/features','FeaturesController@lists');
    Route::get('/features/features_new','FeaturesController@features_new');
    Route::post('/features/features_new_do','FeaturesController@features_new_do');
    Route::get('/features/features_edit/{id}','FeaturesController@features_edit');
    Route::post('/features/features_edit_do','FeaturesController@features_edit_do');
    Route::get('/features/features_del/{id}','FeaturesController@features_del');

    ## 群組權限管理
    Route::get('/grppower','GrppowerController@lists');
    Route::get('/grppower/grppower_new','GrppowerController@grppower_new');
    Route::post('/grppower/grppower_new_do','GrppowerController@grppower_new_do');
    Route::get('/grppower/grppower_edit/{id}','GrppowerController@grppower_edit');
    Route::post('/grppower/grppower_edit_do/{id}','GrppowerController@grppower_edit_do');
    Route::get('/grppower/grppower_del/{id}','GrppowerController@grppower_del');

    ## 模組管理
    Route::get('/mod','ModController@lists');
    Route::get('/mod/mod_edit/{id}','ModController@mod_edit');
    Route::post('/mod/mod_edit_do/{id}','ModController@mod_edit_do');

});
