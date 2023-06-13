<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\ArchiveController;
use App\Http\Controllers\Main\GameController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\LkController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(IndexController::class)->group(function () {
   Route::get('/', 'index')->name('index');
});

Route::controller(GameController::class)->group(function () {
    Route::get('game/{name}', 'index')->name('game')->where(['name' => '[a-z]+']);
    Route::post('game/{name}/prices', 'registerPlayerInGame')
        ->name('registerPlayerInGame')
        ->where(['name' => '[a-z]+']);
});

Route::controller(ArchiveController::class)->group(function () {
    Route::get('/archive', 'index')->name('archive');
});

Route::controller(LkController::class)->middleware('auth')->middleware('auth:api')->group(function () {
   Route::get('personal_account', 'index')->name('personal_account');
});

Route::controller(RegisterController::class)->group(function () {
   Route::get('registration', 'index')->name('registration');
   Route::post('registration/save', 'save')->name('register_store');
   Route::post('login', 'login_store')->name('login_store');
});

//Route::controller(AuthController::class)->group(function () {
//    Route::get('login', 'account')->name('login');
//    Route::get('registration', 'register')->name('register');
//    Route::post('register', 'register_store')->name('register_store');
//    Route::post('login', 'login_store')->name('login_store');
//    Route::get('logout', 'logout')->name('logout');
//});


Route::controller(PagesController::class)->group(function () {
    Route::get('archive', 'archive')->name('archive');
    Route::post('game/saveReg/{id}', 'storePlayers')->name('store_players')->where(['id' => '[0-9]+']);
    Route::post('game/save/{id}', 'storePlayerWithoutRegistarion')->name('storePlayerWithoutRegistarion')
                                                                ->where(['id' => '[0-9]+']);
    Route::post('/', 'saveEmail')->name('save_email');

    Route::get('personal_account/{id}', 'account')->middleware('auth')->name('personal_account');
});

