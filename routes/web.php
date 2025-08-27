<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

//////////// Auth pages
require __DIR__ . '/auth.php';

//////////// Routes for admins
Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AdminArticleController::class)->group(function (){
        Route::get('/admin/articles', 'index')->name('admin-page.index');
        Route::get('/admin/articles/create', 'create')->name('admin-page.article.create');
        Route::post('/admin/articles/create', 'store')->name('admin-page.article.store');
        Route::get('/admin/articles/{article}', 'edit')->name('admin-page.article.edit');
        Route::put('/admin/articles/{article}', 'update')->name('admin-page.article.update');
        Route::delete('/admin/articles/{article}', 'destroy')->name('admin-page.article.delete');



    });

    Route::controller(AdminCategoryController::class)->group(function (){
        Route::get('/admin/categories', 'index')->name('admin-page.categories');
        Route::post('/admin/categories', 'store')->name('admin-page.categories.store');
        Route::delete('/admin/categories/{category}', 'destroy')->name('admin-page.categories.delete');
    });

    Route::controller(AdminTagController::class)->group(function (){
        Route::get('/admin/tags', 'index')->name('admin-page.tags');
        Route::post('/admin/tags', 'store')->name('admin-page.tags.store');
        Route::delete('/admin/tags/{tag}', 'destroy')->name('admin-page.tags.delete');
    });
});

//////////// Routes for guests
Route::get('/about', fn () => view('guestpages.about'))->name('guest-page.about');
Route::get('/{article}', [ArticleController::class, 'show'])->name('guest-page.show');
Route::get('/', [ArticleController::class, 'index'])->name('guest-page.index');
