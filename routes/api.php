<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TasksController;
Route::prefix('v1')->group(function (){
   Route::get('/tasks', [\App\Http\Controllers\Api\V1\TasksController::class, 'index']); 
Route::post('/tasks', [\App\Http\Controllers\Api\V1\TasksController::class, 'store']); 
Route::get('/tasks/{id}', [\App\Http\Controllers\Api\V1\TasksController::class, 'show']); 
Route::put('/tasks/{id}', [\App\Http\Controllers\Api\V1\TasksController::class, 'update']);
Route::delete('/tasks/{id}', [\App\Http\Controllers\Api\V1\TasksController::class, 'destroy']);
Route::patch('/tasks/{id}', [\App\Http\Controllers\Api\V1\TasksController::class, 'complete']);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
