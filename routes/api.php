<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
// User Signup
Route::post('/signup-user',[CustomAuthController::class,'signupUser']);
// User login
Route::post('/login-user',[CustomAuthController::class,'loginUser']);
// Create post
Route::post('/createpost',[PostController::class,'postCreatePost']);
// Get All Posts
Route::get('/',[PostController::class,'getAllPosts']);



// Post Comment
Route::post('/post-comment/{id}',[CommentController::class,'postcomment']);