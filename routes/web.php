<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




Route::get('/home', function () {
    return view('dashboard.view');
})->name('dashboard.view');
Route::group(['middleware' => ['auth']], function () {
    /*-------------------------- users Routes  ---------------------------*/
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('delete/{user}', [UserController::class, 'delete'])->name('delete');

    });
    
    /*-------------------------- Roles Routes  ---------------------------*/
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::post('store', [RoleController::class, 'store'])->name('store');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('edit');
        Route::put('update/{role}', [RoleController::class, 'update'])->name('update');
        Route::delete('delete/{role}', [RoleController::class, 'delete'])->name('delete');

    });


    

        

        Route::get('/categories', function () {

            return view('categories.view');
        })->name('categories.view');

        Route::get('/products', function () {
            return view('products.view');
        })->name('products.view');

        Route::get('/stores', function () {
            return view('stores.view');
        })->name('stores.view');


        Route::get('/orders', function () {
            return view('orders.view');
        })->name('orders.view');

        Route::get('/add-product', function () {
            return view('products.add');
        })->name('products.add');


});
