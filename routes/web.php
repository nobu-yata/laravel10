<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::post('/', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');

Route::get('/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::post('/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::post('/update', [ArticleController::class, 'update'])->name('articles.update');

Route::post('/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
