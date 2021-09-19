<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => 'this must be the loging form view')->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('articles', [ArticleController::class, 'store']);
    Route::patch('articles/{article}', [ArticleController::class, 'update']);
    Route::delete('articles/{article}', [ArticleController::class, 'destroy']);
});

