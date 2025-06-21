<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/change-password', [AuthController::class, 'changePassword'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/products',       [ProductController::class, 'index']);
    Route::get('/products/{id}',  [ProductController::class, 'show']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/products',       [ProductController::class, 'store']);
    Route::put('/products/{id}',   [ProductController::class, 'update']);
    Route::delete('/products/{id}',[ProductController::class, 'destroy']);
});

