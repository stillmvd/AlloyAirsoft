<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('admin');
    Route::get('credential', 'credential')->name('credential');
    Route::post('admin', 'create')->name('create');
    Route::get('admin/players', 'players')->name('players');
    Route::get('admin/users', 'users')->name('users');

    Route::get('game/{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
    Route::put('game/{id}/edit', 'update')->name('update')->where(['id' => '[0-9]+']);
    Route::delete('game/{id}/delete', 'delete')->name('delete')->where(['id' => '[0-9]+']);

    Route::post('credential/contact_information', 'contactInformation')->name('contactInformation');
    Route::post('credential/player_information', 'playerInformation')->name('playerInformation');
    Route::post('credential/admin_information', 'adminInformation')->name('adminInformation');

    Route::get('deleteP/{id}', 'deletePlayer')->name('deletePlayer')->where(['id' => '[0-9]+']);
    Route::get('deleteU/{id}', 'deleteUser')->name('deleteUser')->where(['id' => '[0-9]+']);

    Route::post('getAchievements/{id}', 'getAchievements')->name('getAchievements')
                                                        ->where(['id' => '[0-9]+']);
});
