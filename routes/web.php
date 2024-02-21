<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[Controller::class,'info']);
Route::get('/signup',[UserController::class,'create']);
Route::post('/logup',[UserController::class,'store']);

Route::get('/signin',[UserController::class,'signin']);
Route::post('/login',[UserController::class,'login']);

Route::post('/logout',[UserController::class,'logout']);

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('/user', UserController::class)->only('edit','update','destroy');
    Route::prefix('/admin')->group(function(){
        Route::resource('/categories',CategoryController::class)->except('show');
        Route::resource('/products',ProductController::class)->except('index','show');
        Route::get('/products',[ProductController::class,'indexadmin']);
    });
});

Route::resource('/products',ProductController::class)->only('index','show');
