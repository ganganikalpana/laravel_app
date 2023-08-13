<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

Route::get('/register', function () {
    return view('reg');
});

Route::Get('/', function () {
    $posts=[];
    if (Auth()->check()){
        $posts=Auth()->user()->userCoolPosts()->latest()->get();
    }
    return view('home',['posts'=>$posts]);
});

Route::POST('/register', [UserController::class,'register']);

Route::POST('/login', [LoginController::class,'login']);

// Route::get('/logout', [LoginController::class,'logout']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//posts

Route::Get('/post', function () {
    $posts=[];
    if (Auth()->check()){
        $posts=Auth()->user()->userCoolPosts()->latest()->get();
    }
    return view('posts',['posts'=>$posts]);
});

Route::POST('/createPost', [PostController::class,'createPost']);
Route::Get('/edit-post/{post}',[PostController::class,'showEditScreen'] );
Route::PUT('/edit-post/{post}',[PostController::class,'updatePost'] );
Route::Delete('/delete-post/{post}',[PostController::class,'removePost'] );


