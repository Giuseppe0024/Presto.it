<?php

namespace App\Http\Controllers;

use App\Models\Article;

class RevisorController extends Controller
{
    public function index()
    {
        $articles_to_check = Article::where('is_accepted', null)->first();

        return view('revisor.index', compact('articles_to_check'));
    }
}
