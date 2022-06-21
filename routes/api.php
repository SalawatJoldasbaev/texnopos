<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




Route::get('/login/employee', [AuthController::class, 'loginEmployee']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/getme', [AuthController::class, 'getMe']);
});


