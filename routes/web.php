<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::middleware('auth')
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('home');
        })->name('dashboard');

        Route::get('/events', [EventController::class, 'index'])->name('event.index');
        Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
    });

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');
