<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('info', [PagesController::class, 'info'])->name('info');
Route::get('archive', [PagesController::class, 'archive'])->name('archive');