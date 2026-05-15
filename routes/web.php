<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DocumentController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('dashboard');
    Route::resource('applications', ApplicationController::class);
    Route::resource('documents', DocumentController::class);
});

Route::get('/', fn() => redirect()->route('dashboard'));

require __DIR__.'/settings.php';