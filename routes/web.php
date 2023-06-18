<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


Route::get('/home', function () {
    return view('dashboard.view');
})->name('dashboard.view');
Route::get('/categories', function () {
    return view('categories.view');
})->name('categories.view');
Route::get('/products', function () {
    return view('products.view');
})->name('products.view');

Route::get('/stores', function () {
    return view('stores.view');
})->name('stores.view');

Route::get('/users', function () {
    return view('users.show_user');
})->name('users.show_user');
Route::get('/orders', function () {
    return view('orders.view');
})->name('orders.view');
Route::get('/roles', function () {
    return view('roles.index');
})->name('roles.index');

Route::get('/add-product', function () {
    return view('products.add');
})->name('products.add');
