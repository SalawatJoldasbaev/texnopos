<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;

Route::get('/employee/login', [AuthController::class, 'loginEmployee']);
Route::controller(TeamsController::class)->group(function(){
    Route::get('allteams','allTeams');
    Route::get('team/{team}','oneTeam');
});
Route::controller(PortfolioController::class)->group(function(){
    Route::get('allportfolios','allPortfolios');
    Route::get('oneportfolio/{portfolio}','onePortfolio');
});
Route::controller(NewsController::class)->group(function(){
    Route::get('allnews','getNews');
    Route::get('onenews/{news}','oneNews');
});
Route::controller(BlogController::class)->group(function(){
    Route::get('allblogs','getBlogs');
    Route::get('oneblog/{blog}','oneblog');
});

Route::get('/teacher/show',[TeacherController::class,'show']);
Route::get('course/show',[CourseController::class,'show']);

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
        Route::put('/teacher/update/{id}', 'update');
        Route::delete('/teacher/delete/{id}', 'delete');
        Route::get('/teacher/history', 'history');
        Route::get('/teacher/restore/{id}', 'restore');
    });
    Route::controller(CourseController::class)->group(function(){
        Route::post('/course/create', 'create');
        Route::put('/course/update/{id}', 'update');
        Route::delete('/course/delete/{id}', 'delete');
        Route::get('/course/history', 'history');
        Route::get('/course/restore/{id}', 'restore');
    });
    Route::controller(NewsController::class)->group(function(){
        Route::post('news/create','create');
        Route::delete('news/delete/{news}','delete');
        Route::put('news/update/{news}','update');  
    });
    Route::controller(BlogController::class)->group(function(){
        Route::post('blog/create','create');
        Route::delete('blog/delete/{blog}','delete');
        Route::put('blog/update/{blog}','update');  
    });
    Route::controller(PortfolioController::class)->group(function(){
        Route::post('portfolio/create','create');
        Route::delete('portfolio/delete/{portfolio}','delete');
        Route::put('portfolio/update/{portfolio}','update');    
    });
    Route::controller(TeamsController::class)->group(function(){
        Route::post('team/create','create');
        Route::delete('team/delete/{team}','delete');
        Route::put('team/update/{team}','update');
    });
    Route::controller(CompanyController::class)->group(function(){
        Route::put('company/edit','update');
        Route::get('company','getCompany');
    });
});
