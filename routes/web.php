<?php

use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\PublicPageController;
use App\Http\Controllers\PostController;
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
Route::post('/register', [UserController::class, "register"]); 
Route::post('/login', [UserController::class, "login"]); 
Route::post('/logout', [UserController::class, "logout"]);
Route::post('/create-post', [PostController::class, "create_post"]);
Route::get('/create-new-post', [PostController::class, "show_form_create_post"]);

Route::get('/post/{post_data}', [PostController::class, "show_post"]);