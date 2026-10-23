<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

//landing page
Route::get('/', function() {
    return view('home');
})->name('home');

// public routes for unssigned users
Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Authorized routes
Route::middleware('auth')->group(function() {
    Route::post('/logout', LogoutController::class)->name('logout');
});