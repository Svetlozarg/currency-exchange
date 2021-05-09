<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartJsController;

Auth::routes();

// Protect routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Path on '/profile' return ProfileController
    Route::view('profile','profile')->name('profile');
    Route::post('/profile', [HomeController::class, 'profileUpdate'])->name('profileUpdate');

    // Path on '/' return the DashboardController and fire the index method
    Route::view('/', 'dashboard')->name('dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // Get the chart path and display view with index method
    Route::get('/chart', [ChartJsController::class, 'index'])->name('chartjs.index');
});
