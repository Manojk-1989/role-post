<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/user-dashboard', [UserController::class, 'dashboard']);
Route::post('/store-dashboard', [PostController::class, 'store']);



