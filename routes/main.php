<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('archive', [PagesController::class, 'archive'])->name('archive');
Route::get('game/{id}', [PagesController::class, 'game'])->name('game');
Route::post('game/{id}', [PagesController::class, 'storePlayers'])->name('store_players');
Route::post('/', [PagesController::class, 'saveEmail'])->name('save_email');
