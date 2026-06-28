<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories'],
            'user_id' => ['required', 'exists:users'],
            'delivery_pickup' => ['boolean'],
            'delivery_shipping' => ['boolean'],
        ]);

        return Article::create($data);
    }

    public function create()
    {
        return view('article.create');
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories'],
            'user_id' => ['required', 'exists:users'],
            'delivery_pickup' => ['boolean'],
            'delivery_shipping' => ['boolean'],
        ]);

        $article->update($data);

        return $article;
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json();
    }

    public function myArticles()
    {
        return view('article.myArticles');
    }

    public function article()
    {
        return view('article.article');

    }
}
