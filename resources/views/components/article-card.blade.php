@props(['article', 'fluid' => false])

<div class="h-100 {{ $fluid ? 'w-100' : '' }}">
    <div class="card article-card h-100 border-0 rounded-4 overflow-hidden {{ $fluid ? 'w-100' : 'article-card-fixed' }}">
        <a href="{{ route('article.show', $article) }}"
           class="text-decoration-none">
            <img src="https://picsum.photos/300/200" class="card-img-top article-card-img" alt="">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title article-card-title text-greymasala">{{ $article->title }}</h5>
                <a href="{{ route('article.byCategory', $article->category) }}"
                   class="d-block mb-1 fst-italic text-decoration-none text-greymasala">{{ $article->category->name }}</a>
                <p class="fw-bold text-primary mb-3">{{ number_format($article->price, 2, ',', '.') }} €</p>
            </div>
        </a>
    </div>
</div>
