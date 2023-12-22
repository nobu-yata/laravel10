<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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


Route::get('/article', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('articles.store');
Route::post('/article/csv', [ArticleController::class, 'csvDownload'])->name('articles.csvDownload');
Route::get('/article/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::post('/article/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::post('/article/update', [ArticleController::class, 'update'])->name('articles.update');
Route::post('/article/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/user/register', [RegisterController::class, 'create'])->name('auth.create');
Route::post('/user/store', [RegisterController::class, 'store'])->name('auth.store');
