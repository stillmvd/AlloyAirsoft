<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(AccountController::class)->group(function () {
    Route::post('/save_avatar', 'saveAvatar')->name('saveAvatar');
    Route::post('/delete_avatar/{id}', 'deleteAvatar')->name('deleteAvatar')->where(['id' => '[0-9]+']);
    Route::post('/change_credential', 'changeCredentialForUser')->name('changeCredentialForUser');
    Route::get('/personal_account/{id}/create_team', 'createTeam')->name('createTeam')->where(['id' => '[0-9]+']);
    Route::post('/personal_account/{id}/create_team', 'storeTeam')->name('storeTeam')->where(['id' => '[0-9]+']);
});
