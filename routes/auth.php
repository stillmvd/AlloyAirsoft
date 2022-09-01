<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::view('login', 'admin.login')->name('login');
Route::post('login', [AdminController::class, 'login'])->name('store');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');
