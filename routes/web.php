<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;


// Login routes
Route::get('/', [LoginUserController::class, 'loginShow']);
Route::post('/login', [LoginUserController::class, 'login'])->name('login');

//logout
Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

// Registration route
Route::post('/register', [RegisterUserController::class, 'userRegister'])->name('register');


// Protected routes
Route::middleware('auth')->group(function () {
    //home page
    Route::get('/home', [HomeController::class, 'homeShow']);

    //upload post
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    //profile page
    Route::get('/profile', [ProfilesController::class, 'showProfile'])->name('profile');

    //like dislike
    Route::post('/post/{post}/like', 'PostLikeController@like')->name('post.like');
    Route::post('/post/{post}/dislike', 'PostLikeController@dislike')->name('post.dislike');




});

Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');