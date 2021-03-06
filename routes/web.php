<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', LogoutController::class)->name('logout');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.delete');

Route::post('/post/{post}/like', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/post/{post}/unlike', [PostLikeController::class, 'destroy'])->name('posts.unlike');

Route::get('/user/{user:name}/posts', UserPostController::class)->name('user.posts');