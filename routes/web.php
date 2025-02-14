<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Livewire\FollowersPage;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//   return view('welcome');
// });

//Route::get('/dashboard', [AuthController::class, 'loadHomePage']); //->middleware('auth');
Route::get('/404', [AuthController::class, 'load404']);

Route::get('/register', [AuthController::class, 'loadRegisterForm']);
Route::post('/register/user', [AuthController::class, 'registerUser'])->name('registerUser');

Route::get('/login', [AuthController::class, 'loadLoginPage']);
Route::post('/login/user', [AuthController::class, 'LoginUser'])->name('LoginUser');

Route::get('/logout', [AuthController::class, 'LogoutUser']);

Route::get('/forgot/password', [AuthController::class, 'forgotPage']);
Route::post('/forgot', [AuthController::class, 'forgotPassword'])->name('forgot');

Route::get('/reset/password', [AuthController::class, 'loadResetPassword']);
Route::post('/reset/user/password', [AuthController::class, 'ResetPassword'])->name('ResetPassword');

Route::get('/user/dashboard', [UserController::class, 'dashboardPage'])->middleware('user');

Route::get('/my/posts', [UserController::class, 'loadMyPosts'])->middleware('user');
Route::get('/create/post', [UserController::class, 'loadCreatePost'])->middleware('user');
Route::get('/edit/post/{post_id}', [UserController::class, 'loadEditPost'])->middleware('user');
Route::get('/view/post/{id}', [UserController::class, 'loadPostPage'])->middleware('user');
Route::get('/profile', [UserController::class, 'loadProfile'])->middleware('user');
Route::get('/view/profile/{user_id}', [UserController::class, 'loadGuestProfile'])->middleware('user');
Route::get('/followers', [UserController::class, 'loadFollowersPage'])->middleware('user');

Route::get('/admin/dashboard', [AdminController::class, 'dashboardPage'])->middleware('admin');
