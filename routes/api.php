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

Route::get('/posts', 'API\PostController@index');
Route::post('/posts', 'API\PostController@store');
Route::put('/posts/{post}', 'API\PostController@update');
Route::delete('/posts/{post}', 'API\PostController@destroy');
