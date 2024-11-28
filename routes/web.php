<?php

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('change',[LanguageController::class,'change'])->name('setlang');
    Route::get('/getprivate', function () {
        // Additional checks can be added here to determine user eligibility
        $path = storage_path('app/private/img015.jpg');

        return response()->file(storage_path('app/private/img015.jpg'));

    });
    Route::get('/test', [testController::class, 'index'])->name('pelis');

});

require __DIR__.'/auth.php';    
