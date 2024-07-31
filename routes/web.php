<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes(); // Includes routes for login, logout, registration, password reset, etc.

Route::middleware(['auth'])->group(function () {
    Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
    Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
    Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');
});

// Custom authentication routes
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Resource routes for incomes
Route::resource('incomes', IncomeController::class)->middleware('auth');

// Dashboard route
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Analytics route
Route::get('/analytics', [AnalyticsController::class, 'index'])->middleware('auth')->name('analytics');

