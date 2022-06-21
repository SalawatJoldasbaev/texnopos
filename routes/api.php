<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login/employee', [AuthController::class, 'loginEmployee']);

Route::middleware('auth:sanctum')->group(function(){
  Route::controller(ImageController::class)->group(function(){
    Route::post('image/upload','upload');
    Route::delete('image/delete/{filename}','delete');
    Route::get('/images','allImages');
  })
    Route::get('/getme', [AuthController::class, 'getMe']);
});


