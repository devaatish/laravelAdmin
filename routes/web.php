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

Route::group(['namespace'=>'Auth','prefix'=>'AdminPanel'],function(){
	
	// RegisterController

	Route::get('Signup','RegisterController@show');
	Route::post('SignupForm','RegisterController@signUp');

});


Route::group(['namespace'=>'Admin','prefix'=>'AdminPanel'],function(){
	
	// LoginController

	Route::get('/','LoginController@index');
	Route::post('/Login','LoginController@login');
	Route::post('/validateCapcha','LoginController@validateCapcha');
	Route::any('/Logout','LoginController@logout');
	Route::post('/ForgotPassword','LoginController@forgotPassword');
	Route::any('/ResetPassword','LoginController@resetPassword');
	Route::post('/UpdatePassword','LoginController@updatepassword');


	//AdminController

	Route::get('/Dashboard','AdminController@dashboard');


	//UserController

	//for datatable
	Route::get('datatable', ['uses'=>'UserController@datatable']);
	Route::get('datatable/getUsers', ['as'=>'datatable.getUsers','uses'=>'UserController@getUsers']);

	Route::get('getAllUsers','UserController@getAllUsers');
	Route::get('/Users','UserController@show');
});
