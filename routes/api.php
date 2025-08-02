<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Customer
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('bookings', [BookingController::class, 'index']);
    Route::post('bookings/store', [BookingController::class, 'store']);

    // Admin

    Route::get('admin/bookings', [AdminController::class, 'bookings']);
    Route::post('services/store', [ServiceController::class, 'store']);
    Route::post('services/update/{service}', [ServiceController::class, 'update']);
    Route::delete('services/delete/{service}', [ServiceController::class, 'destroy']);

});