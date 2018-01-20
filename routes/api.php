<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Authenticate'], function () {

	Route::post('login','LoginController@login');

});

Route::group(['namespace' => 'User'], function () {

	Route::apiResource('user', 'UserController', ['only' => [
	    'store', 'update', 'destroy'
	]]);

	Route::get('user','UserController@fetch');
	Route::get('user/{id}','UserController@find');

	Route::post('user/delete','UserController@destroyMulti');

});




