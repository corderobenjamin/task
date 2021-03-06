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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>['auth','admin'], 'middlewareGroups'=>'web'], function(){

	Route::get('/task/create', 'TaskController@create');
	Route::post('/task/store', 'TaskController@store');
	Route::get('/task/{task}/edit', 'TaskController@edit');
	Route::put('/task/{task}/update', 'TaskController@update');
	Route::delete('/task/{task}/delete','TaskController@destroy');

});

Route::group(['middleware'=>'auth', 'middlewareGroups'=>'web'], function(){
	Route::get('/task', 'TaskController@index');
});