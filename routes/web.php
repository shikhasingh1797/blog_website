<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class,'getAllPosts']);

Route::get('/login',[CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');

Route::get('/signup',[CustomAuthController::class,'signup']);

Route::post('/signup-user',[CustomAuthController::class,'signupUser'])->name('signup-user');


Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');

Route::get('/logout',[CustomAuthController::class,'logout']);


Route::post('/createpost',['uses'=>'PostController@postCreatePost','as'=>'post.create']);

Route::get('comment', [CommentController::class,'getcomment']);


Route::post('/post-comment',[CommentController::class,'postcomment'])->name('post-comment');