@props(['article', 'fluid' => false])

<div class="{{ $fluid ? 'h-100 w-100' : '' }}">
    <div class="card article-card h-100 border-0 rounded-4 overflow-hidden {{ $fluid ? 'w-100' : 'article-card-fixed' }}">
        <x-article.card-image :article="$article"/>
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center gap-2 small text-greymasala mb-1">
                <a href="{{ route('article.search', ['city' => $article->city]) }}"
                   class="text-truncate text-decoration-none text-greymasala position-relative z-2">{{ $article->city }}</a>
                <span>|</span>
                <a href="{{ route('article.byCategory', $article->category) }}"
                   class="fst-italic fw-bold text-decoration-none text-greymasala position-relative z-2 flex-shrink-0">{{ $article->category->name }}</a>
            </div>
            <h5 class="card-title article-card-title">
                <a href="{{ route('article.show', $article) }}"
                   class="stretched-link text-greymasala">{{ $article->title }}</a>
            </h5>
            <p class="fw-bold text-primary mb-0">{{ number_format($article->price, 2, ',', '.') }} €</p>
        </div>
    </div>
</div>
