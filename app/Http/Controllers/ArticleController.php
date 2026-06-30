<?php

namespace App\Http\Controllers;

use App\Models\Article;

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

    public function show()
    {
        return view('article.show');
    }
    /*    public function index()
        {
            return Article::all();
        }*/

}
