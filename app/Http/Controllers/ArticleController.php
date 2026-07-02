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
        $articles = auth()->user()->articles()->latest()->get();

        return view('article.myArticles', [
            'articles' => $articles,
        ]);
    }

    public function show(int $article)
    {
        Article::findOrFail($article)::where('is_accepted', true);

        $article = Article::find($article);

        return view('article.show', [
            'article' => $article,
        ]);
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(12);

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);

        return view('article.byCategory', [
            'articles' => $articles,
            'category' => $category,
        ]);
    }
}
