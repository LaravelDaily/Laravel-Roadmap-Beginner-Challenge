<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['as' => 'admin.'], function () {
        //Category
        Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
        Route::post('category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
        Route::patch('category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');

        //Tag
        Route::get('tag', [\App\Http\Controllers\Admin\TagController::class, 'index'])->name('tag.index');
        Route::post('tag', [\App\Http\Controllers\Admin\TagController::class, 'store'])->name('tag.store');
        Route::patch('tag/{id}', [\App\Http\Controllers\Admin\TagController::class, 'update'])->name('tag.update');
        Route::delete('tag/{id}', [\App\Http\Controllers\Admin\TagController::class, 'destroy'])->name('tag.destroy');

        //Article
        Route::resource('article',\App\Http\Controllers\Admin\ArticleController::class);
    });
});
require __DIR__ . '/auth.php';

Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('home.index');

Route::get('/services', function () {
   return view('front.service.index');
})->name('service');

Route::view('/about', 'front.about.index')->name('about');

Route::get('/contact', \App\Http\Controllers\Front\ShowContactController::class)->name('contact');

Route::get('/{category}', [\App\Http\Controllers\Front\HomeController::class, 'showCategory'])->name('category.index');
Route::get('/{category}/{slug}', [\App\Http\Controllers\Front\HomeController::class, 'showBlogDetail'])->name('blog.detail');

