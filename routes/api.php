<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MobileStoreController;
use App\Http\Controllers\OrderDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserAddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('addresses', UserAddressController::class, ['parameters' => ['addresses' => 'userAddress']]);
    // Route::resource('orders', OrderController::class)->except(['update','destroy']);


     /*-------------------------- Orders Routes  ---------------------------*/
     Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('create', [OrderController::class, 'create'])->name('create');
        Route::post('store', [OrderController::class, 'store'])->name('store');
        Route::get('edit/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::put('update/{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('delete/{order}', [OrderController::class, 'delete'])->name('delete');

    });

});

Route::resource('dashboard-orders', OrderDashboardController::class, ['parameters' => ['dashboard-orders' => 'order']])->except(['store']);



// Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


Route::get('mobile/products', MobileStoreController::class);



Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', ProductController::class)->except('destroy');
Route::put('products/{product}/changeStatus', [ProductController::class, 'changeStatus']);

Route::resource('categories', ProductCategoryController::class, ['parameters' => ['categories' => 'productCategory']]);
Route::resource('stores', StoreController::class);

Route::post('login', [LoginController::class,"login"]);
Route::post('register', [LoginController::class,"register"]);


