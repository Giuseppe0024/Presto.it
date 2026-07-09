<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    // Rotte in cui è visibile la barra di ricerca
    public array $searchRoutes = [
        'homepage',
        'article.show',
        'article.index',
        'article.byCategory',
        'article.search',
    ];

    public bool $showSearch;

    public function __construct()
    {
        $this->showSearch = request()->routeIs(...$this->searchRoutes);
    }

    public function render()
    {
        return view('components.navbar');
    }
}
