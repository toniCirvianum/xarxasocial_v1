<?php

use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;

Route::get('/', [testController::class,'index']);
Route::get('/users',[testController::class,'users']);
