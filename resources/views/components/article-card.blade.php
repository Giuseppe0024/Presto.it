@props(['article', 'fluid' => false])

<div class="h-100 {{ $fluid ? 'w-100' : '' }}">
    <div class="card article-card h-100 border-0 rounded-4 overflow-hidden {{ $fluid ? 'w-100' : 'article-card-fixed' }}">
        <a href="{{ route('article.show', $article) }}"
           class="text-decoration-none">
            @if($article->images->isNotEmpty())
                <img src="{{ Storage::url($article->images->first()->path) }}" class="card-img-top article-card-img"
                     alt="{{ $article->title }}">
            @else
                <div class="card-img-top article-card-img d-flex align-items-center justify-content-center bg-body-secondary">
                    <i class="fa-solid fa-thumbtack-slash fs-5"></i>
                </div>
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title article-card-title text-greymasala">{{ $article->title }}</h5>
                <div class="d-flex">
                    <a href="{{ route('article.byCategory', $article->category) }}"
                       class="d-block mb-1 fst-italic text-decoration-none text-greymasala">{{ $article->category->name }}</a>
                </div>
                <p class="fw-bold text-primary mb-3">{{ number_format($article->price, 2, ',', '.') }} €</p>
            </div>
        </a>
    </div>
</div>
