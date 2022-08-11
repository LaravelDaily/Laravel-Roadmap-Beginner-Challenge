<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagsController;

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


// Route::view('/', 'homepage')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'aboutme')->name('about');
Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        '/articles' => ArticlesController::class,
        '/categories' => CategoriesController::class,
        '/tags' => TagsController::class,
    ]);
});

require __DIR__.'/auth.php';
