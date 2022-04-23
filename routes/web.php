<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('welcome');

Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register.store');

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'store'])->name('auth.login.store');

// --> User <--
Route::get('/home', [HomeController::class, 'index'])->name('user.home');

//Profile
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('user.show.profile');
Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->name('user.edit.profile');
Route::patch('/profile/{username}/update', [ProfileController::class, 'update'])->name('user.update.profile');
Route::get('/follow/{userId}', [ProfileController::class, 'follow'])->name('user.follow.profile');

//Posts
Route::get('/create-post', [PostController::class, 'create'])->name('user.create.post');
Route::post('/create-post/create', [PostController::class, 'store'])->name('user.store.post');
Route::get('/post/{postId}', [PostController::class, 'show'])->name('user.show.post');
Route::post('/post/{postId}/comment', [CommentController::class, 'store'])->name('user.store.comment');

Route::get('/logout', [HomeController::class, 'logout'])->name('user.logout');

// --> Admin <--
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');