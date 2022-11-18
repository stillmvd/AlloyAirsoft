<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('archive', [PagesController::class, 'archive'])->name('archive');
Route::get('game/{name}', [PagesController::class, 'game'])->name('game');
Route::post('game/saveReg/{id}', [PagesController::class, 'storePlayers'])->name('store_players');
Route::post('game/save/{id}', [PagesController::class, 'storePlayerWithoutRegistarion'])->name('storePlayerWithoutRegistarion');
Route::post('/', [PagesController::class, 'saveEmail'])->name('save_email');

Route::get('personal_account/{id}', [PagesController::class, 'account'])->middleware('auth')->name('personal_account');
