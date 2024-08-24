<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/events')
    ->group(function() {
        Route::get('/', [EventController::class, 'index']);
        Route::get('/{event}', [EventController::class, 'show']);
        Route::get('/{event}/event-gallery', [EventController::class, 'eventGallery']);
        Route::post('/{event}/photo-upload', [EventController::class, 'uploadPhoto'])->middleware('auth:sanctum');

    });

Route::middleware('auth:sanctum')
    ->prefix('/photos')
    ->group(function() {
        Route::get('/{event}/my-photos', [PhotoController::class, 'myPhotos']);
        Route::delete('/{photo}/destroy', [PhotoController::class, 'destroy']);
    });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');
