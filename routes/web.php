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
	Route::get('/create','SalesmanController@create');
	Route::post('/store','SalesmanController@store');
	Route::post('/destroy','SalesmanController@destroy');
	Route::get('/edit/{id}','SalesmanController@edit');
	Route::post('/update/{id}','SalesmanController@update');
	Route::post('/checkName','SalesmanController@checkName');
});
//拜访会议管理
Route::prefix('visit')->group(function(){
	Route::get('/','VisitController@index');
	Route::get('/create','VisitController@create');
	Route::post('/store','VisitController@store');
	Route::post('/destroy','VisitController@destroy');
	Route::get('/edit/{id}','VisitController@edit');
	Route::post('/update/{id}','VisitController@update');
});
