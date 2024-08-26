<?php

use App\Url\UrlController;
use Illuminate\Support\Facades\Route;

Route::resource('url', UrlController::class);
Route::get('/url/{url}/stats', [UrlController::class, 'stats'])->name('url.stats');
Route::get('/{shortCode}', [UrlController::class, 'redirect'])->name('url.redirect');
