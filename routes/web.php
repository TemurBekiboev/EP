<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('secondVersion.index');
});
Route::get('/product-info', function () {
    return view('secondVersion.productDetail');
});
Route::get('/product', function () {
    return view('secondVersion.products');
});
Route::get('/admin', function () {
    return view('secondVersion.adminView.index');
});
Route::get('/admin-login', function () {
    return view('secondVersion.adminView.login');
});
Route::get('/user-login', function () {
    return view('secondVersion.login');
});
Route::get('/user-register', function () {
    return view('secondVersion.registration');
});