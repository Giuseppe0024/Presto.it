@props(['article'])

@if($article->images->isNotEmpty())
    <img src="{{ $article->images->first()->getUrl(400, 300) }}" class="card-img-top article-card-img"
         alt="{{ $article->title }}">
@else
    <div class="card-img-top article-card-img d-flex align-items-center justify-content-center bg-body-secondary">
        <i class="fa-solid fa-thumbtack-slash fs-5"></i>
    </div>
@endif
