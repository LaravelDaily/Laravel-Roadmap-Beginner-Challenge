<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\ShowArticleController;
use App\Models\Category;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Tag;
use App\Http\Controllers\Admin\TagController;
use App\Models\Article;
use App\Http\Controllers\Admin\ArticleController;

Route::get('/', HomeController::class)->name('home');
Route::get('/show-article/{article_id}', ShowArticleController::class)->name('show-article');
Route::view('/about', 'about')->name('about');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('tags', TagController::class)->except('show')->except('show');
        Route::resource('articles', ArticleController::class)->except('index','show');
    });
});