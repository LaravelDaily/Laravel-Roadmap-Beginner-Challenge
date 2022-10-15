<?php

use App\Http\Controllers;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/article', function () {
    return view('article');
})->name('article');



Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('tags',TagController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('posts',PostController::class);
});




require __DIR__.'/auth.php';
