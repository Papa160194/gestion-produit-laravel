<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Page d'accueil
Route::get('/', function () {
    $products = \App\Models\Product::latest()->take(6)->get();
    return view('home', compact('products'));
})->name('home');

// Routes CRUD pour les produits
Route::resource('products', ProductController::class);
