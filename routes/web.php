<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MessageController::class, 'index'])->name('home');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');