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

Route::get('listUser', 'UserController@listUser');
Route::get('showUser/{id}', 'UserController@showUser');
Route::post('createUser', 'UserController@createUser');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');

Route::get('listPost', 'PostController@listPost');
Route::get('showPost/{id}', 'PostController@showPost');
Route::post('createPost', 'PostController@createPost');
Route::put('updatePost/{id}', 'PostController@updatePost');
Route::delete('deletePost/{id}', 'PostController@deletePost');