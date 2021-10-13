<?php

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\ArticleController as HomeArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about-me', 'about')->name('about');

Route::get('/articles/{article}', [HomeArticleController::class, 'show'])->name('articles.show');

Route::view('/dashboard', 'dashboard.home')->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::resource('articles', ArticleController::class)->except(['show']);

    Route::resource('categories', CategoryController::class)->except(['show']);

    Route::resource('tags', TagController::class)->except(['show']);
});

require __DIR__.'/auth.php';
