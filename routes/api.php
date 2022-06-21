<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




Route::get('/employee/login', [AuthController::class, 'loginEmployee']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/getme', [AuthController::class, 'getMe']);
    Route::post('/employee/create', [AuthController::class, 'createEmployee']);
});


