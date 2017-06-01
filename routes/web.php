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

// Route::get('/', function () {
//     //return view('welcome');
//     return view('admin.layout.default');
// });

Route::group(['namespace'=>'Admin','prefix'=>'AdminPanel'],function(){
	Route::get('/','LoginController@index');
	Route::post('/Login','LoginController@login');
	Route::get('/Dashboard','AdminController@dashboard');
});