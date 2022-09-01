<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('archive', [PagesController::class, 'archive'])->name('archive');
Route::get('game/{id}', [PagesController::class, 'game'])->name('game');
Route::post('game/{id}', [PagesController::class, 'storePlayers'])->name('store_players');
Route::post('/', [PagesController::class, 'saveEmail'])->name('save_email');

Route::view('login', 'admin.login')->name('login');
Route::post('login', [AdminController::class, 'login'])->name('store');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('credential', [AdminController::class, 'credential'])->name('credential');
    Route::post('admin', [AdminController::class, 'create'])->name('create');
    Route::get('admin/players', [AdminController::class, 'players'])->name('players');

    Route::get('game/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('game/{id}/edit', [AdminController::class, 'update'])->name('update');
    Route::delete('game/{id}/delete', [AdminController::class, 'delete'])->name('delete');
});

