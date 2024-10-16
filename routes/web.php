<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductCreateController;
use App\Http\Controllers\ProductUpdateController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\CategoryCreateController;
use App\Http\Controllers\CategoryUpdateController;
use App\Http\Controllers\SubCategoryCreateController;
use App\Http\Controllers\SubCategoryUpdateController;

//  Guest Routes
Route::get('/', function (){
   return view('index');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin-login-form');
    Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('admin-login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin-dashboard');
        //product
        Route::post('/dashboard/product/create',[ProductCreateController::class,'create'])->name('product-create');
        Route::post('/dashboard/product/{id}/update',[ProductUpdateController::class,'update'])->name('product-update');
        Route::post('/dashboard/product/{id}/delete',[ProductUpdateController::class,'delete'])->name('product-delete');
        //category
        Route::post('/dashboard/category/create',[CategoryCreateController::class,'create'])->name('category-create');
        Route::put('/dashboard/category/{id}/update',[CategoryUpdateController::class,'update'])->name('category-update');
        Route::delete('/dashboard/category/{id}/delete',[CategoryUpdateController::class,'delete'])->name('category-delete');
        //sbc
        Route::post('/dashboard/subcategory/create',[SubCategoryCreateController::class,'create'])->name('sub-category-create');
        Route::put('/dashboard/subcategory/{id}/update',[SubCategoryUpdateController::class,'update'])->name('sub-category-update');
        Route::delete('/dashboard/subcategory/{id}/delete',[SubCategoryUpdateController::class,'delete'])->name('sub-category-delete');
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
