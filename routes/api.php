<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Authentication Routes
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);





//this is for admin
Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    Route::post('services', [ServiceController::class, 'store']);
    Route::put('services/{id}', [ServiceController::class, 'update']);
    Route::delete('services/{id}', [ServiceController::class, 'destroy']);
});






//this is for user
Route::get('services', [ServiceController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('bookings', [BookingController::class, 'store']);
    Route::get('bookings', [BookingController::class, 'index']);
});
