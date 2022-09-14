<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('ZcfRdXnzkAtaUwdQSfJxMnMiahitXqrK', [AdminController::class, 'login'])->name('login');
Route::post('ZcfRdXnzkAtaUwdQSfJxMnMiahitXqrK', [AdminController::class, 'login_store'])->name('store');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');
