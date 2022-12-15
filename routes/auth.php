<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'account'])->name('login');
Route::get('registration', [AuthController::class, 'register'])->name('register');

Route::post('register', [AuthController::class, 'register_store'])->name('register_store');

Route::post('login', [AuthController::class, 'login_store'])->name('login_store');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
