<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('archive', [PagesController::class, 'archive'])->name('archive');
Route::get('game/{id}', [PagesController::class, 'game'])->name('game');
Route::post('game/{id}', [PagesController::class, 'store_players'])->name('store_players');
Route::post('/', [PagesController::class, 'save_email'])->name('save_email');

Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('login', [AdminController::class, 'store'])->name('store');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/users', [AdminController::class, 'users'])->name('users');
});

