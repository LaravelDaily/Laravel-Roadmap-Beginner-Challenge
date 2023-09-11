<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

// Invokable Route
Route::get('/', App\Http\Controllers\HomeController::class)->name('welcome');

// View Routes
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Resource Routes
Route::resource('article', ArticleController::class);
Route::resource('category', CategoryController::class);
Route::resource('tag', TagController::class);
