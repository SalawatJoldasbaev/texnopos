<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




Route::get('/employee/login', [AuthController::class, 'loginEmployee']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/getme', [AuthController::class, 'getMe']);
    Route::post('/employee/create', [AuthController::class, 'createEmployee']);
    Route::get('/employee/show', [AuthController::class, 'showEmployee']);
    Route::delete('/employee/delete/{employee}', [AuthController::class, 'deleteEmployee']);
    Route::put('/employee/update/{employee}', [AuthController::class, 'updateEmployee']);
    Route::get('/employee/history', [AuthController::class, 'history']);
    Route::get('/employee/restore/{id}', [AuthController::class, 'restore']);
});
