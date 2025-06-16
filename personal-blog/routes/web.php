<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListArticleController;
use App\Http\Controllers\ListCategoryController;
use App\Http\Controllers\ListTagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Route for dashboard with middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route for list of article to edit in dashboard with middleware
Route::get('/list/article', ListArticleController::class)
    ->name('list.article')
    ->middleware('auth');
// Route for list of category to edit in dashboard with middleware
Route::get('/list/category', ListCategoryController::class)
    ->name('list.category')
    ->middleware('auth');
// Route for list of tag to edit in dashboard with middleware
Route::get('/list/tag', ListTagController::class)
    ->name('list.tag')
    ->middleware('auth');

// Profile routes with auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route for the home page displaying articles
Route::get('/', [ArticleController::class, 'index'])->name('home');


// Routes for authenticated users to manage articles, tags, and categories
Route::middleware('auth')->group(function () {
    Route::resource('article', ArticleController::class)->except(['index', 'show']);
    Route::resource('tag', TagController::class)->except(['index', 'show']);
    Route::resource('category', CategoryController::class)->except(['index', 'show']);
});


// Route for displaying a single article
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');


// Route for a static 'about me' page
Route::view('/aboutme', 'aboutMe')->name('aboutme');

require __DIR__ . '/auth.php';
