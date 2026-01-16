<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('produk')->group(function () {
    //route task 3 Auth Login dengan JWT
    Route::middleware('auth:api')->get('/', [ProductController::class, 'index']);

    //route tidak terprotect JWT
    Route::get('public', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('{id}', [ProductController::class, 'update']);
    Route::get('{id}', [ProductController::class, 'show']);
    Route::delete('{id}', [ProductController::class, 'destroy']);
});

