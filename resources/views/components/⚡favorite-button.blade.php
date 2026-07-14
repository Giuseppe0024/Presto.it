<?php

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public Article $article;

    public bool $isFavorite = false;

    public function mount(Article $article): void
    {
        $this->article = $article;
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

<div>
    <button 
        wire:click="toggleFavorite" 
        class="btn favorite-button {{ $isFavorite ? 'favorites--active' : 'favorites--inactive' }} position-absolute top-0 end-0 m-2 z-3 p-2 rounded-circle border-0 shadow-sm"
        aria-label="{{ $isFavorite ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti' }}"
        >
        <i class="fa-solid fa-carrot text-white{{ $isFavorite ? '' : '-circle' }}"></i>
    </button>
</div>