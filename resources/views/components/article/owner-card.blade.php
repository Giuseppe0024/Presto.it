@props(['article'])

<div class="card article-card rounded-4 overflow-hidden h-100 d-flex justify-content-around border-0">
    <x-article.card-image :article="$article"/>
    <x-article.status-badge :article="$article"/>
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->description }}</p>

        <div class="d-flex gap-4 ps-2">
            <a href="#" class="btn btn-secondary">Modifica</a>
            <a href="#" class="btn btn-primary">Elimina</a>
        </div>
    </div>
</div>
