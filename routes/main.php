<?php

use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'saveEmail')->name('save_email');
});

