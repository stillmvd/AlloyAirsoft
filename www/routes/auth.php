<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'account')->name('login');
    Route::get('registration', 'register')->name('register');
    Route::post('register', 'register_store')->name('register_store');
    Route::post('login', 'login_store')->name('login_store');
    Route::get('logout', 'logout')->name('logout');
});

