<?php

use App\Http\Controllers\Auth\ArticleController;
use App\Http\Controllers\ArticleController as HomeArticleController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/articles/{article}', [HomeArticleController::class, 'show'])->name('articles.show');

Route::prefix('auth')->middleware(['auth'])->group(function () {

    Route::get('articles/{article}', [ArticleController::class, 'show'])->name('auth.articles.show'); /* is this necessary? */
    Route::post('articles', [ArticleController::class, 'store'])->name('auth.articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('auth.articles.edit');
    Route::patch('articles/{article}', [ArticleController::class, 'update'])->name('auth.articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('auth.articles.destroy');

    Route::get('categories', [CategoryController::class, 'create'])->name('auth.categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('auth.categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('auth.categories.edit');
    Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('auth.categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('auth.categories.destroy');

    Route::get('tags', [TagController::class, 'create'])->name('auth.tags.create');
    Route::post('tags', [TagController::class, 'store'])->name('auth.tags.store');
    Route::get('tags/{tag}/edit', [TagController::class, 'edit'])->name('auth.tags.edit');
    Route::patch('tags/{tag}', [TagController::class, 'update'])->name('auth.tags.update');
    Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('auth.tags.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
