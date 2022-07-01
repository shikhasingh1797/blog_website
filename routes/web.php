<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PostController;
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
// Route::post('/',['uses'=>'PostController@getAllPosts']);
// Route::get('/signup', function () {
//     return view('Signup');
// });
// Route::get('/login', function () {
//     return view('Login');
// });
// Route::get('/front', function () {
//     return view('front');
// });
Route::get('/login',[CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');

Route::get('/signup',[CustomAuthController::class,'signup']);

Route::post('/signup-user',[CustomAuthController::class,'signupUser'])->name('signup-user');


Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');

Route::get('/logout',[CustomAuthController::class,'logout']);


Route::post('/createpost',['uses'=>'PostController@postCreatePost','as'=>'post.create']);

// Route::get('/getAllPosts',['uses'=>'PostController@postCreatePost']);


// Route::get('/createpost',['uses'=>'PostController@postCreatePost','as'=>'get.post']);


// Route::post('/createpost',[PostController::class,'postCreatePost']);