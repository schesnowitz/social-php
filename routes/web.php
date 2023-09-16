<?php

use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\PublicPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicPageController;

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

Route::get('/', [UserController::class, "showIndex"]);
Route::get('/about', [PublicPageController::class, "about"]);
Route::post('/register', [UserController::class, "register"]); 
Route::post('/login', [UserController::class, "login"]); 