<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

    $posts = Post::latest()->get();

    return view('welcome', compact(['posts']));
})->name('home');


Route::view('about', 'about')->name('about');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::group(['middleware' => 'can:admin',], function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'posts' => Post::simplePaginate(5),
        ]);
    })->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [AdminPostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
        Route::post('/posts/{post}', [AdminPostController::class, 'update'])->name('posts.update');
    });

});


require __DIR__ . '/auth.php';
