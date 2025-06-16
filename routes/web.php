<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::redirect('/dashboard', '/admin/articles')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::group([
    'prefix'=> 'admin',
    'as'=> 'admin.',
    'middleware'=> ['auth'],
], function () {
    Route::resource('category', CategoryController::class)
        ->only(['index','store', 'update', 'destroy']);

    Route::resource('tag', TagController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource('articles', ArticleController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::view('about', 'about')
    ->name('about');
Route::get('/', [GuestArticleController::class, 'index']);
Route::get('articles/{id}', [GuestArticleController::class, 'show'])
    ->name('article.show');

require __DIR__.'/auth.php';
