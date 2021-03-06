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
//users

Route::get('users', 'UserControllerAPI@getUsers');
Route::get('users/emailavailable', 'UserControllerAPI@emailAvailable');
Route::get('users/{id}', 'UserControllerAPI@getUser');
Route::post('user/store', 'UserControllerAPI@store');
Route::put('users/{id}', 'UserControllerAPI@update');
Route::delete('users/{id}', 'UserControllerAPI@delete');

//Piece
Route::get('image', 'ImageControllerAPI@getAllImage');
Route::get('image/{id}', 'ImageControllerAPI@getImage');
Route::delete('image/{id}', 'ImageControllerAPI@delete');
Route::put('image/{id}', 'ImageControllerAPI@update');



Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
});

Route::post('login', 'LoginControllerAPI@login');
Route::middleware('auth:api')->post('logout',
 'LoginControllerAPI@logout');

Route::get('teste', function () {
 return response()->json(['msg'=>'Só um teste'], 200);
});

Route::middleware('auth:api')->get('teste', function () {
 return response()->json(['msg'=>'Só um teste'], 200);
});

