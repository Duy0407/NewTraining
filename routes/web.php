<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\UserController;

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




Route::middleware(['guest'])->group(function (){
    Route::get('/login', [UserController::class, 'showLogin'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('getLogin');

    Route::get('/register', [UserController::class, 'showRegister'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('getRegister');

});

Route::middleware(['auth'])->group(function (){
    Route::group(['prefix' => 'admin', 'name' => 'admin'], function(){
        Route::resource('product', ProductController::class);
        Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
    });

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::resource('/', WelcomeController::class);
});




