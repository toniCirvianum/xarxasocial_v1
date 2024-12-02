<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvaContrller;
use App\Http\Controllers\testController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [ImageController::class,'myImages'])
->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('change',[LanguageController::class,'change'])->name('setlang');
    Route::get('/uploadimages',[ImageController::class,'index'])->name('upload.images');
    Route::patch('/uploadimages',[ImageController::class,'store'])->name('store.image');
    Route::get('detail/{image_id}',[ImageController::class,'detail'])->name('detail.image');

});

require __DIR__.'/auth.php';    
