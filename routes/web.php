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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return to_route('articles.index');
})->name('homepage');

// Used auth middleware in the controller's __construct()
Route::resource('articles', ArticleController::class);

Route::group(['middleware' => 'auth'], function() {
    Route::resources([
        'categories' => CategoryController::class,
        'tags' => TagController::class
    ]);
});

Route::view('about', 'about')->name('about');

require __DIR__.'/auth.php';
