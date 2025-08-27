<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;



// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class)->except('show');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

// Homepage
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::redirect('/home', '/', 301);

// Article Page
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

// Static Pages
Route::view('/about', 'about')->name('about');


require __DIR__.'/auth.php';