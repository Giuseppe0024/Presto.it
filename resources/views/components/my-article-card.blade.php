@props(['article'])

<div class="card article-card rounded-4 overflow-hidden h-100 d-flex justify-content-around border-0">
    <img src="https://picsum.photos/500/350" class="card-img-top article-card-img" alt="Annuncio">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->description }}</p>
        <a href="#" class="btn btn-secondary">Modifica</a>
        <a href="#" class="btn btn-primary">Elimina</a>
    </div>
</div>
