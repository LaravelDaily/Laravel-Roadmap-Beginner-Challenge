<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', function(){
    return view('dashboard');
});

Route::get('/articles',[ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}',[ArticleController::class, 'show'])->name('articles.show');
Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::resource('articles', ArticleController::class)->except([
        'index', 'show'
    ]);
    Route::resources([
        'categories' => CategoryController::class,
        'tags' => TagController::class,
    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');
