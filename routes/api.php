<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ImageController::class)->group(function(){
    Route::post('image/upload','upload');
    Route::delete('image/delete/{filename}','delete');
    Route::get('/images','allImages');
});
