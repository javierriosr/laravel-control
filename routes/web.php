<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación
Auth::routes();

// Rutas personalizadas para login y registro
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Ruta de logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de ingresos
Route::resource('incomes', IncomeController::class);
