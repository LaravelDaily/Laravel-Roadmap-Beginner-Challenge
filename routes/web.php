<?php

use App\Http\Controllers\Auth\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

// display single views

Route::get('/login', fn () => 'this must be the loging form view')->name('login');

Route::prefix('auth')->middleware(['auth'])->group(function () {

    Route::get('articles/{article}', [ArticleController::class, 'show'])->name('auth.articles.show'); /* is this necessary? */
    Route::post('articles', [ArticleController::class, 'store'])->name('auth.articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('auth.articles.edit');
    Route::patch('articles/{article}', [ArticleController::class, 'update'])->name('auth.articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('auth.articles.destroy');

});

