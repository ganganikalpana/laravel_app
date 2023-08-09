<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::Get('/login', function () {
    return view('login');
});

Route::POST('/register', [UserController::class,'register']);

Route::POST('/login', [LoginController::class,'login']);

Route::POST('/logout', [LoginController::class,'logout']);

//posts

Route::Get('/post', function () {
    $posts=[];
    if (auth()->check()){
        $posts=auth()->user()->userCoolPosts()->latest()->get();
    }
    return view('posts',['posts'=>$posts]);
});

Route::POST('/createPost', [PostController::class,'createPost']);
Route::Get('/edit-post/{post}',[PostController::class,'showEditScreen'] );
Route::PUT('/edit-post/{post}',[PostController::class,'updatePost'] );
Route::Delete('/delete-post/{post}',[PostController::class,'removePost'] );


