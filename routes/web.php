<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Articoli
Route::get('/articoli', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articolo/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/categoria/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::middleware('auth')->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/i-miei-articoli', [ArticleController::class, 'myArticles'])->name('article.myArticles');
});
