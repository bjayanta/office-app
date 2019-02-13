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

// cerdential route
Route::post('login', 'Api\CredentialController@login');
Route::post('register', 'Api\CredentialController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::resources([
        'todo' => 'Api\TodoController', // todo resource route

    ]);

    // Todo resource
    Route::get('/get-user', 'Api\UserController@credential');
});

