<?php

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

// This should have a middlware auth:api with token, login... or any type of security.
Route::group(['middleware' => 'web'], function () {
    Route::get('/properties', 'RWPropertyController@apply_filters');
});
