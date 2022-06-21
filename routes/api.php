<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

Route::get('/login/employee', [AuthController::class, 'loginEmployee']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/getme', [AuthController::class, 'getMe']);

    Route::controller(ImageController::class)->group(function(){
        Route::post('image/upload','upload');
        Route::delete('image/delete/{filename}','delete');
        Route::get('/images','allImages');
    });

    Route::controller(CompanyController::class)->group(function(){
        Route::put('company/edit','update');
        Route::get('company','getCompany');
    });
});


