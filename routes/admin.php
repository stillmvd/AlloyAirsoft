<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('credential', [AdminController::class, 'credential'])->name('credential');
    Route::post('admin', [AdminController::class, 'create'])->name('create');
    Route::get('admin/players', [AdminController::class, 'players'])->name('players');

    Route::get('game/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('game/{id}/edit', [AdminController::class, 'update'])->name('update');
    Route::delete('game/{id}/delete', [AdminController::class, 'delete'])->name('delete');

    Route::post('credential/contact_information', [AdminController::class, 'contactInformation'])->name('contactInformation');
    Route::post('credential/player_information', [AdminController::class, 'playerInformation'])->name('playerInformation');
    Route::post('credential/admin_information', [AdminController::class, 'adminInformation'])->name('adminInformation');
});
