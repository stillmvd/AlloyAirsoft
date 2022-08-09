<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('archive', [PagesController::class, 'archive'])->name('archive');
Route::get('game/{id}', [PagesController::class, 'game'])->name('game');
Route::post('game/{id}', [PagesController::class, 'game'])->name('store');

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('admin/users', [AdminController::class, 'users'])->name('users');