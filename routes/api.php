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

Route::get('srting','api\redisController@stringRedis');
Route::get('list','api\redisController@listRedis');
Route::get('set','api\redisController@setRedis');
Route::get('sort','api\redisController@sortRedis');
Route::get('hash','api\redisController@hashRedis');
