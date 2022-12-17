<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::post('/save_avatar', [AccountController::class, 'saveAvatar'])->name('saveAvatar');
Route::post('/delete_avatar/{id}', [AccountController::class, 'deleteAvatar'])->name('deleteAvatar');
Route::post('/change_credential', [AccountController::class, 'changeCredentialForUser'])->name('changeCredentialForUser');
Route::get('/personal_account/{id}/create_team', [AccountController::class, 'createTeam'])->name('createTeam');
Route::post('/personal_account/{id}/create_team', [AccountController::class, 'storeTeam'])->name('storeTeam');
