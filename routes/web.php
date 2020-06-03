<?php

use Illuminate\Support\Facades\Route;

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
//业务员管理
Route::prefix('salesman')->group(function(){
	Route::get('/','SalesmanController@index');
	
});


//客户管理
Route::prefix('client')->group(function(){
    //客户展示页面
    Route::get('/','ClientController@index');
    //客户添加
    Route::get('create','ClientController@create');
    //判断客户唯一性
    Route::post('checkName','ClientController@checkName');
    //客户执行添加
    Route::post('store','ClientController@store');
    //客户修改页面
    Route::get('edit/{id}','ClientController@edit');
    //客户修改执行页面
    Route::post('update/{id}','ClientController@update');
    //客户删除页面
    Route::get('destroy/{id}','ClientController@destroy');
});

//登录
Route::prefix('login')->group(function(){
    //客户登录页面
    Route::get('/','LoginController@login');
    //登录执行
    Route::post('logindo','LoginController@logindo');
});