@props(['article'])

<div class="card article-card rounded-4 overflow-hidden h-100 d-flex justify-content-around border-0">

    @if($article->images->isNotEmpty())
        <img src="{{ $article->images->first()->getUrl(400, 300) }}" class="card-img-top article-card-img"
             alt="{{ $article->title }}">
    @else
        <div class="card-img-top article-card-img d-flex align-items-center justify-content-center bg-body-tertiary">
            <i class="fa-solid fa-thumbtack-slash fs-5"></i>
        </div>
    @endif
    @if($article->is_accepted === null)
        <div class=" card-header d-flex justify-content-center">
            <p class="bg-info-subtle px-3 py-2 mb-0 rounded-2">Annuncio in stato di verifica</p>
        </div>
    @elseif($article->is_accepted === 0)
        <div class=" card-header d-flex  justify-content-center border-0">
            <p class="bg-primary-subtle px-3 py-2 mb-0 rounded-2 ">Annuncio rifiutato</p>
        </div>

    @elseif($article->is_accepted === 1)
        <div class=" card-header d-flex  justify-content-center border-0">
            <p class="bg-success-subtle px-3 py-2 mb-0 rounded-2 ">Annuncio online</p>
        </div>
    @endif
    <div class="card-body">

        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->description }}</p>
        <a href="#" class="btn btn-secondary">Modifica</a>
        <a href="#" class="btn btn-primary">Elimina</a>
    </div>
</div>
