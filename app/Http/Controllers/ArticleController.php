<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function myArticles()
    {
        return view('article.myArticles');
    }

    public function show(int $article)
    {
        Article::findOrFail($article);

        $article = Article::find($article);

        return view('article.show', [
            'article' => $article,
        ]);
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(8);

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->orderBy('created_at', 'desc')->paginate(8);

        return view('article.byCategory', [
            'articles' => $articles,
            'category' => $category,
        ]);
    }
}
