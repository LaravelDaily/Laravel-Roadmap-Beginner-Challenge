<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-me', [FrontendController::class, 'about'])->name('about');
Route::get('/{article}', [FrontendController::class, 'showArticle'])->name('showArticle');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('tags', App\Http\Controllers\TagController::class);

    Route::resource('categories', App\Http\Controllers\CategoryController::class);

    Route::resource('articles', App\Http\Controllers\ArticleController::class);
});

require __DIR__ . '/auth.php';
