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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('all-user', 'Api\UserController@allUser');
    Route::get('show', 'Api\UserController@show');
    Route::get('logout', 'Api\AuthController@logout');
});