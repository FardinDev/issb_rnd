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

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});

Route::group([
    'prefix' => 'v1'
], function()
{


    Route::post('/user-registration', 'Api\Auth\RegistrationController@register');
    Route::post('/user-login', 'Api\Auth\LoginController@login');


    Route::post('/create-post', 'Api\PostController@create');
    Route::post('/get-all-posts', 'Api\PostController@getAllPosts');
    Route::post('/get-latest-posts', 'Api\PostController@getLatest');
    Route::post('/get-user-posts', 'Api\PostController@getUserPosts');
    Route::post('/get-user-posts-with-comments', 'Api\PostController@getUserPostsWithComments');
    Route::post('/find-post', 'Api\PostController@findPost');

    Route::post('/thana-list', 'Api\ThanaController@thanaList');
    Route::post('/phonebook', 'Api\PhonebookController@phonebook');
});