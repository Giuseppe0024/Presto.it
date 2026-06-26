<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\ArticleController;
>>>>>>> feat/ArticleCRUD
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
