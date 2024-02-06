<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('login',[AdminController::class,'login'])->name('login');
    Route::post('connextion',[AdminController::class,'connextion'])->name('connextion');
    Route::get('logout',[AdminController::class,'logout'])->name('logout');

});



Route::get('/',[HomeController::class,'index'])->name('Home');
Route::get('/info',[HomeController::class,'info'])->name('info');

Route::resource('posts',PostController::class);
Route::resource('categories',CategoryController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
