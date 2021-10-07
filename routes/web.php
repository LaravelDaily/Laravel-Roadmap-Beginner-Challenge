<?php

use App\Http\Controllers\Auth\ArticleController;
use App\Http\Controllers\ArticleController as HomeArticleController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-me', fn() => view('about'))->name('about');

Route::get('/articles/{article}', [HomeArticleController::class, 'show'])->name('articles.show');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    Route::get('articles', [ArticleController::class, 'index'])->name('auth.articles.index');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('auth.articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('auth.articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('auth.articles.edit');
    Route::patch('articles/{article}', [ArticleController::class, 'update'])->name('auth.articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('auth.articles.destroy');

    Route::get('categories', [CategoryController::class, 'index'])->name('auth.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('auth.categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('auth.categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('auth.categories.edit');
    Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('auth.categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('auth.categories.destroy');

    Route::get('tags', [TagController::class, 'index'])->name('auth.tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('auth.tags.create');
    Route::post('tags', [TagController::class, 'store'])->name('auth.tags.store');
    Route::get('tags/{tag}/edit', [TagController::class, 'edit'])->name('auth.tags.edit');
    Route::patch('tags/{tag}', [TagController::class, 'update'])->name('auth.tags.update');
    Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('auth.tags.destroy');

    Route::get('/', fn () => view('dashboard'))->name('dashboard');
});

require __DIR__.'/auth.php';
