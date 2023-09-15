<?php

use Illuminate\Support\Facades\Route;

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
    return ('<h1>Welcome</h1><a href="/about">Take Me to About</a>');
});

Route::get('/about', function () {
    return ('<h1>About</h1><a href="/">Take Me Home</a>');
});
