<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PostsController;
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

Route::group(['prefix' => 'auth'], function() {
    Route::post('signup', [AuthController::class, 'signup']);
});

Route::group(['prefix' => 'posts'], function() {
    Route::post('create', [PostsController::class, 'create']);
});

Route::group(['prefix' => 'comments'], function() {
    Route::post('create', [CommentsController::class, 'create']);
});
