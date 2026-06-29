<div>
    <div class="card article-card flex-shrink-0 border-0 rounded-4 overflow-hidden" style="width: 280px;">
        <img src="https://picsum.photos/300/200" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="mb-1 fst-italic">{{ $article->category->name }}</p>
            <p class="fw-bold text-orange mb-3">{{ $article->price }} €</p>
            <a href="{{ route('article') }}" class="btn btn-orange btn-sm rounded-pill">
                Vai all'annuncio
            </a>
        </div>
    </div>
</div>