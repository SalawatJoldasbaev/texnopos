<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\NewsController;

Route::get('/login/employee', [AuthController::class, 'loginEmployee']);
Route::controller(TeamsController::class)->group(function(){
    Route::get('allteams','allTeams');
    Route::get('team/{team}','oneTeam');
});
Route::controller(PortfolioController::class)->group(function(){
    Route::get('allportfolios','allPortfolios');
    Route::get('onePortfolio/{portfolio}','onePortfolio');
});
Route::controller(NewsController::class)->group(function(){
    Route::get('allnews/{type}','getNews');
    Route::get('onenews/{news}','oneNews');
});

Route::middleware('auth:sanctum')->group(function () {
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

    Route::controller(TeamsController::class)->group(function(){
        Route::post('team/create','create');
        Route::delete('team/delete/{team}','delete');
        Route::put('team/update/{team}','update');
    });

    Route::controller(PortfolioController::class)->group(function(){
        Route::post('portfolio/create','create');
        Route::delete('portfolio/delete/{portfolio}','delete');
        Route::put('portfolio/update/{portfolio}','update');    
    });

    Route::controller(NewsController::class)->group(function(){
        Route::post('news/create','create');
        Route::delete('news/delete/{news}','delete');
        Route::put('news/update/{news}','update');  
    });
});
