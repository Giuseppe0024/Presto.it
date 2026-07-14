<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

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
