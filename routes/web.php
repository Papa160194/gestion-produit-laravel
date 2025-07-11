<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('verified');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('verified');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('verified');
});

require __DIR__.'/auth.php';
