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
	Route::get('/CountryStateCity','AdminController@index');
	Route::get('/get-state-list','AdminController@getStateList');
	Route::get('/get-city-list','AdminController@getCityList');

	Route::get('/CMS','AdminController@showcms');
	Route::post('/saveCMS','AdminController@saveCMS');


	//UserController

	//for datatable
	Route::get('datatable', ['uses'=>'UserController@datatable']);
	Route::get('datatable/getUsers', ['as'=>'datatable.getUsers','uses'=>'UserController@getUsers']);

	Route::post('delUser','UserController@delUser');
	Route::get('AddUser','UserController@addUser');
	Route::post('SaveUser','UserController@saveUser');
	Route::get('EditUser/{id}','UserController@editUser');
	Route::post('UpdateUser','UserController@updateUser');
	Route::post('UserBan','UserController@userBan');
	Route::post('UserUnBan','UserController@userUnBan');
	
});
