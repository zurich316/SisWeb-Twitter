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

Route::get('/', 'UsersController@index');
Route::get('/users/sigoa/{id}','UsersController@sigoa');
Route::get('/users/seguidores/{id}','UsersController@seguidores');
Route::get('home', 'UsersController@index');
Route::resource('posts','PostsController');
Route::resource('users','UsersController');
Route::resource('likes','LikesController');
Route::resource('follows','FollowsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
