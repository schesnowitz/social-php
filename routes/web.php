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
// User routes


// Sample gate route

// gate function example
Route::get('admin', function() {
  if (Gate::allows('view_admin_pages')) {
    return "this is admin";
  }
  return "You can't see this";
});

// Gate middleware example
Route::get('admin_middleware', function() {
  return "this is admin";
})->middleware('can:view_admin_pages'); 



Route::get('/', [UserController::class, "showIndex"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest'); 
Route::post('/login', [UserController::class, "login"])->middleware('guest'); 
Route::post('/logout', [UserController::class, "logout"])->middleware('only_logged_in');

// Post routes 
Route::post('/create-post', [PostController::class, "create_post"])->middleware('only_logged_in');
Route::get('/create-new-post', [PostController::class, "show_form_create_post"])->middleware('only_logged_in');
Route::get('/post/{post_data}', [PostController::class, "show_post"]);
Route::delete('/post/{post}', [PostController::class, "delete"])->middleware('can:delete,post'); 
Route::get('/post/{post}/edit', [PostController::class, "show_edit_form"])->middleware('can:update,post'); 
Route::put('/post/{post}', [PostController::class, "save_edit_form"])->middleware('can:update,post');
// User profile routes 
Route::get('/profile/{user:username}', [UserController::class, "profile"]);
Route::get('/manage-avatar', [UserController::class, "avatar_form"])->middleware('only_logged_in');
Route::post('/manage-avatar', [UserController::class, "save_avatar_form"])->middleware('only_logged_in');