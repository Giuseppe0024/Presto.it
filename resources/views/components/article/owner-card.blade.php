@props(['article'])

<div class="card article-card rounded-4 overflow-hidden h-100 d-flex justify-content-around border-0">
    <x-article.card-image :article="$article"/>
    <x-article.status-badge :article="$article"/>
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->description }}</p>

        <div class="d-flex gap-4">
            <a href="{{ route('article.edit', $article) }}" class="btn btn-secondary">Modifica</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#delete-article-{{ $article->id }}">Elimina
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-article-{{ $article->id }}" tabindex="-1"
     aria-labelledby="delete-article-label-{{ $article->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="delete-article-label-{{ $article->id }}">{{ __('ui.deleteTitle') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('ui.deleteConfirm', ['title' => $article->title]) }}
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('ui.cancel') }}</button>
                <form action="{{ route('article.destroy', $article) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
