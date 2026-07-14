<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class FavoriteController extends Controller
{
    public function index(): View
    {
        $favorites = Auth::user()
            ->favorites()
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('favorites.index', compact('favorites'));
    }
}
