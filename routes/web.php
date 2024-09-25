<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
   return view('secondVersion.index');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'authenticate']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('secondVersion.admin.dashboard');
        })->name('admin.dashboard');
    });
});

// User routes
Route::get('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/login', [UserLoginController::class, 'authenticate']);
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

Route::middleware(['user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('secondVersion.user.dashboard');
    })->name('user.dashboard');
});
