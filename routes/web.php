<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('register', [RegisterUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    // TODO: Chnage the logout route to POST request
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::resource('posts', PostController::class);
});

Route::get('dashboard', function () {
    return 'Dashboard';
})->middleware('auth')->name('dashboard');
