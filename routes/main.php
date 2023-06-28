<?php

use App\Http\Controllers\Admin\AdminMainPageController;
use App\Http\Controllers\Admin\AdminPlayersController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
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

Route::controller(LkController::class)->middleware(['auth'])->group(function () {
   Route::get('personal_account', 'index')->name('personal_account');
});

Route::controller(RegisterController::class)->group(function () {
   Route::get('registration', 'index')->name('registration');
   Route::post('registration/save', 'save')->name('register_store');
});

Route::controller(LoginController::class)->group(function () {
   Route::get('login', 'index')->name('login');
   Route::post('login/check', 'check')->name('login_check');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(AdminMainPageController::class)->group(function () {
    Route::get('admin', 'index')->name('admin');
});

Route::controller(AdminPlayersController::class)->group(function () {
    Route::get('admin/players', 'index')->name('players');
    Route::get('admin/players/delete/{id}', 'delete')->name('deletePlayer')->where(['id' => '[0-9]+']);
});

Route::controller(AdminUsersController::class)->group(function () {
    Route::get('admin/users', 'index')->name('users');
    Route::get('admin/users/delete/{id}', 'delete')->name('deleteUser')->where(['id' => '[0-9]+']);
});


Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('credential', 'credential')->name('credential');
    Route::post('admin', 'create')->name('create');
    Route::get('game/{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
    Route::put('game/{id}/edit', 'update')->name('update')->where(['id' => '[0-9]+']);
//    Route::delete('game/{id}/delete', 'delete')->name('delete')->where(['id' => '[0-9]+']);

    Route::post('credential/contact_information', 'contactInformation')->name('contactInformation');
    Route::post('credential/player_information', 'playerInformation')->name('playerInformation');
    Route::post('credential/admin_information', 'adminInformation')->name('adminInformation');

    Route::post('getAchievements/{id}', 'getAchievements')->name('getAchievements')
        ->where(['id' => '[0-9]+']);
});


Route::controller(PagesController::class)->group(function () {
    Route::get('archive', 'archive')->name('archive');
    Route::post('game/saveReg/{id}', 'storePlayers')->name('store_players')->where(['id' => '[0-9]+']);
    Route::post('game/save/{id}', 'storePlayerWithoutRegistarion')->name('storePlayerWithoutRegistarion')
                                                                ->where(['id' => '[0-9]+']);
    Route::post('/', 'saveEmail')->name('save_email');

//    Route::get('personal_account/{id}', 'account')->middleware('auth')->name('personal_account');
});

