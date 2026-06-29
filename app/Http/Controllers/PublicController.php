<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::take(6)->orderby('created_at', 'desc')->get();

        return view('welcome', compact('articles'));
    }

    public function myArticles()
    {
        return view('article.myArticles');
    }
}
