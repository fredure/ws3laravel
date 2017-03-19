<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::group([
	// 'middleware' => 'auth'
// ]);

Route::get('/', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);

Route::get('/view/{id}', [
	'uses' => 'HomeController@view',
	'as' => 'home.view'
]);

Route::get('/order/{id}', [
	'uses' => 'HomeController@order',
	'as' => 'home.order'
]);

Route::post('/ok', [
	'uses' => 'HomeController@ok',
	'as' => 'home.ok'
]);

Route::get('/cabinet', [
	'uses' => 'HomeController@cabinet',
	'as' => 'home.cabinet'
]);

Route::get('/add', [
	'uses' => 'HomeController@add',
	'as' => 'home.add'
]);

Route::post('/add', [
	'uses' => 'HomeController@addPost',
	'as' => 'home.add.post'
]);

Route::get('/edit/{id}', [
	'uses' => 'HomeController@edit',
	'as' => 'home.edit'
]);

Route::post('/edit', [
	'uses' => 'HomeController@editPost',
	'as' => 'home.edit.post'
]);

Route::post('/cancel', [
	'uses' => 'HomeController@cancel',
	'as' => 'home.cancel'
]);

// LOGIN / LOGOUT

Route::get('/auth/login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'auth.login'
]);

Route::post('/auth/login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'auth.login.post'
]);

Route::get('/auth/logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'auth.logout'
]);

// REG

Route::get('/auth/reg', [
	'uses' => 'Auth\AuthController@getRegister',
	'as' => 'auth.reg'
]);

Route::post('/auth/reg', [
	'uses' => 'Auth\AuthController@postRegister',
	'as' => 'auth.reg.post'
]);

