<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\DocsEmployeeController;
Route::prefix('v1')->group(function (){
   Route::get('/docs-employee', [\App\Http\Controllers\Api\V1\DocsEmployeeController::class, 'index']); 
Route::post('/docs-employee', [\App\Http\Controllers\Api\V1\DocsEmployeeController::class, 'store']); 
Route::get('docs-employee/{id}', [\App\Http\Controllers\Api\V1\DocsEmployeeController::class, 'show']); 
Route::put('/docs-employee/{id}', [\App\Http\Controllers\Api\V1\DocsEmployeeController::class, 'update']);
Route::delete('/docs-employee/{id}', [\App\Http\Controllers\Api\V1\DocsEmployeeController::class, 'destroy']);
Route::patch('/docs/employee/{id}', [\App\Http\Controllers\Api\V1\DocsEmployeeController::class, 'markSigned']);
});
