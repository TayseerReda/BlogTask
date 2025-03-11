<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



Route::controller(PostController::class)->middleware(['auth:sanctum', 'throttle:60,1'])->group(function(){
    Route::get('/posts', 'index')->withoutMiddleware('auth:sanctum');
    Route::get('/posts/{id}', 'findById')->withoutMiddleware('auth:sanctum');
    Route::post('/posts', 'create');
    Route::put('/posts/{id}', 'update');
    Route::delete('/posts/{id}', 'delete');
});
