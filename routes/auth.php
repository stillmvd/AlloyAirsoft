<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('login', [AdminController::class, 'login_store'])->name('store');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');
