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

    Route::middleware('role:officer')->prefix('officer')->name('officer.')->group(function() {
        // Route::get('dashboard', [DashboardController::class, 'officer'])->name('dashboard');
    });

    Route::middleware('role:sub_encoder,main_encoder')->prefix('encoder')->name('encoder.')->group(function() {
        // Route::get('dashboard', [DashboardController::class, 'encoder'])->name('dashboard');
    });

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function() {
        // Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    });

    Route::middleware('role:super_admin')->prefix('super_admin')->name('super_admin.')->group(function() {
        // Route::get('dashboard', [DashboardController::class, 'super_admin'])->name('dashboard');
    });
});

Route::get('/test', function() {
    return view('test');
});