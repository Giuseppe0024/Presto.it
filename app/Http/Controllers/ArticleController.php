<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function edit(Article $article)
    {
        abort_if($article->user_id !== auth()->id(), 403);

        return view('article.update', [
            'article' => $article,
        ]);
    }

    public function destroy(Article $article)
    {
        abort_if($article->user_id !== auth()->id(), 403);

        Storage::disk('public')->deleteDirectory("articles/{$article->id}");
        $article->delete();

        return redirect()->route('article.myArticles')->with('success', __('ui.deleteSuccess'));
    }

    public function myArticles()
    {
        $articles = auth()->user()->articles()->with(['category', 'images', 'revision'])->latest()->get();

        return view('article.myArticles', [
            'articles' => $articles,
        ]);
    }

    public function show(Article $article)
    {
        abort_if($article->is_accepted !== true && $article->user_id !== auth()->id(), 404);

        return view('article.show', [
            'article' => $article,
        ]);
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->with(['category', 'images'])->orderBy('created_at', 'desc')->paginate(12);

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->with(['category', 'images'])->orderBy('created_at', 'desc')->paginate(8);

        return view('article.byCategory', [
            'articles' => $articles,
            'category' => $category,
        ]);
    }
}
