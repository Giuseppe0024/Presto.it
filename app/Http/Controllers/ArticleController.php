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

    public function show_test()
    {
        return view('article.show_test');

    }
    /*    public function index()
        {
            return Article::all();
        }*/

}
