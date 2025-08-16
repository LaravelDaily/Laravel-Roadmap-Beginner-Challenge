<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// No Auth required to view articles and front pages
Route::get('/', [DashboardController::class, 'articles'])->name('dashboard');
Route::get('/article/{article}', [DashboardController::class, 'article'])->name('dashboard.article');

// Static about-us page route with callback function and route name
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

// Route grouping and routes with parameters, resource routes
Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags/', [TagController::class, 'store'])->name('tags.store');
    Route::put('/tags/{tag}/update', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

    Route::resource('categories', CategoryController::class);

    Route::resource('articles', ArticleController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
