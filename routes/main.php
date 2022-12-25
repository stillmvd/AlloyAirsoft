<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('archive', 'archive')->name('archive');
    Route::get('game/{name}', 'game')->name('game')->where(['name' => '[a-z]+']);
    Route::post('game/{name}/prices', 'storePrice')->name('storePrice')->where(['name' => '[a-z]+']);
    Route::post('game/saveReg/{id}', 'storePlayers')->name('store_players')->where(['id' => '[0-9]+']);
    Route::post('game/save/{id}', 'storePlayerWithoutRegistarion')->name('storePlayerWithoutRegistarion')
                                                                ->where(['id' => '[0-9]+']);
    Route::post('/', 'saveEmail')->name('save_email');

    Route::get('personal_account/{id}', 'account')->middleware('auth')->name('personal_account');
});

