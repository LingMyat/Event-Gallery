<?php

use App\Http\Controllers\EventController;
use App\JsValidation\JsValidation;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::middleware('auth')
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('home');
        })->name('dashboard');


        Route::resource('events', EventController::class);
    });

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

// validation package that I develop
Route::post('/mss-validation/validate',[JsValidation::class, 'validate'])
    ->name('mss-validation.validate');
