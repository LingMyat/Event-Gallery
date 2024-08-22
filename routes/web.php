<?php

use App\JsValidation\JsValidation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;

Route::redirect('/', '/dashboard');
Route::middleware('auth')
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('home');
        })->name('dashboard');


        Route::resource('events', EventController::class);

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');
    });

Route::get('/login', fn() => view('auth.login'))->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');


// validation package that I develop
Route::post('/mss-validation/validate',[JsValidation::class, 'validate'])
    ->name('mss-validation.validate');
