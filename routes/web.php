<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

//  Guest Routes
Route::get('/', function (){
   return view('index');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin-login-form');
    Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('admin-login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin-dashboard');
    });
});

// User routes
Route::get('/login', [UserLoginController::class, 'login'])->name('login-form');
Route::post('/login', [UserLoginController::class, 'authenticate'])->name('login');
Route::get('/register', [UserRegisterController::class, 'showRegistrationForm'])->name('register-form');
Route::post('/register', [UserRegisterController::class, 'register'])->name('register');
Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');


Route::middleware([UserMiddleware::class])->group(function () {
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard');
});
