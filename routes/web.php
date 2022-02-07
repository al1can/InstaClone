<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/post/{post}/likes', [App\Http\Controllers\LikesController::class, 'index']);

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store']);
Route::delete('/post/{post}', [App\Http\Controllers\PostsController::class, 'destroy']);

Route::get('/profile/{user}/followers',[App\Http\Controllers\FollowsController::class, 'followers']);
Route::get('/profile/{user}/following',[App\Http\Controllers\FollowsController::class, 'following']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::post('/like/{post}', [App\Http\Controllers\LikesController::class, 'store']);

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::post('/comment/{post}', [App\Http\Controllers\CommentsController::class, 'store']);
Route::delete('/comment/{post}', [App\Http\Controllers\CommentsController::class, 'destroy']);