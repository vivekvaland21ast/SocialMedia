<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('masterLayout');
});

Route::get('/login', function () {
    return view('layouts.login');
});
