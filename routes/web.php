<?php

use App\Auth\AuthController;
use App\Jobs\ExportJob;
use App\Url\Url;
use App\Url\UrlController;
use Illuminate\Support\Facades\Route;

Route::view('/auth/register', 'auth.register')->name('register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::view('/auth/login', 'auth.login')->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

Route::delete('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/url/{url}/export', function (Url $url) {
    ExportJob::dispatch($url);

    return 'Export job is successful. Check the laravel.log file.';
})->name('url.export');
Route::get('/url/{url}/stats', [UrlController::class, 'stats'])->can('viewStats', 'url')->name('url.stats');
Route::resource('url', UrlController::class)->middleware('auth');
Route::get('/{shortCode}', [UrlController::class, 'redirect'])->name('url.redirect');
