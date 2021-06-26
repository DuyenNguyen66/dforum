<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Auth
Route::post('login', 'AuthController@login');
Route::post('register', 'UserController@store');
Route::post('logout', 'AuthController@logout');

// Question and Answer
Route::get('question/{slug}', 'QuestionController@show')->name('questions.show');
Route::get('question/{id}/answers', 'AnswerController@index');


Route::apiResource('answers', 'AnswerController')->except(['create', 'edit']);

// Need token
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::apiResource('questions', 'QuestionController')->except(['create', 'edit']);

    // User
    Route::post('logout', 'AuthController@logout');
    Route::get('users', 'UserController@index');
    Route::get('user-info', 'UserController@show');

    // Voting
    Route::post('voting', 'VotingController@voting');
});
