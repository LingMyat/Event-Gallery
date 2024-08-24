<?php

use App\JsValidation\JsValidation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\DashboardController;

Route::redirect('/', '/dashboard');
Route::middleware('auth')
    ->group(function() {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');


        Route::resource('events', EventController::class);
        Route::get('/events/{event}/gallery', [EventController::class, 'gallery'])
            ->name('events.gallery');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::patch('/photos/{photo}/change-status', [PhotoController::class, 'changeStatus'])
            ->name('photos.changeStatus');
    });

Route::get('/login', fn() => view('auth.login'))->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');


// validation package that I develop
Route::post('/mss-validation/validate',[JsValidation::class, 'validate'])
    ->name('mss-validation.validate');
