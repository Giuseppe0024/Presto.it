<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


// Articoli
Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
Route::get('/i-miei-articoli', [PublicController::class, 'myArticles'])->name('article.myArticles');
Route::get('/articolo', [PublicController::class, 'article'])->name('article');