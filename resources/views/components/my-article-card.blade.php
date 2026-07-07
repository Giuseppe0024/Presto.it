@props(['article'])

<div class="card article-card rounded-4 overflow-hidden h-100 d-flex justify-content-around border-0">
    @if($article->images->isNotEmpty())
        <img src="{{ Storage::url($article->images->first()->path) }}" class="card-img-top article-card-img"
             alt="{{ $article->title }}">
    @else
        <div class="card-img-top article-card-img d-flex align-items-center justify-content-center bg-body-tertiary">
            <i class="fa-solid fa-thumbtack-slash fs-5 text-secondary"></i>
        </div>
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->description }}</p>
        <a href="#" class="btn btn-secondary">Modifica</a>
        <a href="#" class="btn btn-primary">Elimina</a>
    </div>
</div>
