<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;

Route::get('/employee/login', [AuthController::class, 'loginEmployee']);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ImageController::class)->group(function () {
        Route::post('image/upload', 'upload');
        Route::delete('image/delete/{filename}', 'delete');
        Route::get('/images', 'allImages');
    });
    Route::controller(AuthController::class)->group(function() {
        Route::get('/getme', 'getMe');
        Route::post('/employee/create', 'createEmployee');
        Route::get('/employee/show', 'showEmployee');
        Route::delete('/employee/delete/{employee}', 'deleteEmployee');
        Route::put('/employee/update/{employee}', 'updateEmployee');
        Route::get('/employee/history', 'history');
        Route::get('/employee/restore/{id}', 'restore');
    });
    Route::controller(TeacherController::class)->group(function() {
        Route::post('/teacher/create', 'create');
        Route::get('/teacher/show', 'show');
        Route::put('/teacher/update/{teacher}', 'update');
        Route::delete('/teacher/delete/{teacher}', 'delete');
        Route::get('/teacher/history', 'history');
        Route::get('/teacher/restore/{id}', 'restore');
    });
    Route::controller(CourseController::class)->group(function(){
        Route::post('/course/create', 'create');
        Route::get('/course/show', 'show');
        Route::put('/course/update/{id}', 'update');
        Route::delete('/course/delete/{course}', 'delete');
        Route::get('/course/history', 'history');
        Route::get('/course/restore/{id}', 'restore');
    });
});
