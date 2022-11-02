<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('account', [AuthController::class, 'account'])->name('account');

Route::post('register', [AuthController::class, 'register_store'])->name('register_store');

Route::post('login', [AuthController::class, 'login_store'])->name('login_store');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
