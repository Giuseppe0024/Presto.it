<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/search', [PublicController::class, 'searchArticles'])->name('article.search');

// Articoli
Route::get('/articoli', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articolo/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/categoria/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::middleware('auth')->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/i-miei-articoli', [ArticleController::class, 'myArticles'])->name('article.myArticles');
    Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');

});

Route::middleware('isRevisor')->group(function () {
    Route::get('revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');
});

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor'); // Attenzione: rotta in chiaro

Route::post('lang/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
