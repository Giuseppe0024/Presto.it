<?php

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public Article $article;

    public bool $isFavorite = false;

    public string $variant = 'aside';

    public function mount(Article $article, string $variant = 'aside'): void
    {
        $this->article = $article;
        $this->variant = $variant;

        $this->checkIfFavorite();
    }

    public function toggleFavorite(): void
{
    if (! Auth::check()) {
        $this->redirectRoute('login');

        return;
    }

    if ($this->isFavorite) {
        Auth::user()
            ->favorites()
            ->detach($this->article->id);

        $this->isFavorite = false;
    } else {
        Auth::user()
            ->favorites()
            ->attach($this->article->id);

        $this->isFavorite = true;
    }
}

    private function checkIfFavorite(): void
    {
        if (! Auth::check()) {
            return;
        }

        $this->isFavorite = Auth::user()
            ->favorites()
            ->where('article_id', $this->article->id)
            ->exists();
    }
    
};


?>

<div class=" {{ $variant === 'aside' ? 'd-grid' : '' }}">
    @if ($variant === 'aside')

        <button
            type="button"
            wire:click="toggleFavorite"
            class="btn favorite-button-aside rounded-pill fw-semibold
                {{ $isFavorite ? 'favorite-button-aside--active' : 'favorite-button-aside--inactive' }}"
            aria-label="{{ $isFavorite 
                        ? 'favorite-button-aside--active' 
                        : 'favorite-button-aside--inactive' }}">
            
            <i class="fa-solid fa-carrot me-2"></i>

            {{ $isFavorite
                ? 'Rimuovi dai preferiti'
                : 'Aggiungi ai preferiti' }}

        </button>

    @else

        <button
            type="button"
            wire:click="toggleFavorite"
            class="btn favorite-button bg-white
                {{ $isFavorite ? 'favorites--active' : 'favorites--inactive' }}
                position-absolute top-0 end-0 m-2 z-3 p-2
                rounded-circle border-0 shadow-sm"
            aria-label="{{ $isFavorite ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti' }}">

            <i class="fa-solid fa-carrot"></i>

        </button>

    @endif
</div>

