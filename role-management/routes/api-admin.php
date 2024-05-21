<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);