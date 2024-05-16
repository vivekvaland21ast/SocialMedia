<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;


//middleware
// Route::get('/home', function () {
//     return view('home');
// })->middleware('custom.auth')->name('home');


// Route::get('/user', function () {
//     return "hello logged in";
// });

//homepage
Route::get('/home', [HomeController::class, 'homeShow']);

// Login routes
Route::get('/', [LoginUserController::class, 'loginShow']);
Route::post('/login', [LoginUserController::class, 'login'])->name('login');

//logout
Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

// Registration route
Route::post('/register', [RegisterUserController::class, 'userRegister'])->name('register');

//upload post
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');