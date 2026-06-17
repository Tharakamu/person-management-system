<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PersonApiController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'message' => 'API Working'
    ]);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function ($request) {
        return $request->user();
    });

    // Person API Routes

    Route::get('/persons', [PersonApiController::class, 'index']);

    Route::get('/persons/{id}', [PersonApiController::class, 'show']);

    Route::post('/persons', [PersonApiController::class, 'store']);

    Route::put('/persons/{id}', [PersonApiController::class, 'update']);

    Route::delete('/persons/{id}', [PersonApiController::class, 'destroy']);

Route::get('/dashboard', [PersonApiController::class, 'dashboard']);

Route::get('/persons-search', [PersonApiController::class, 'search']);

});
