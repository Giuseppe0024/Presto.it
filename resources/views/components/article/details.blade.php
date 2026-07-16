@props(['article', 'showMeta' => true])

    <div>
        <h1 class="">{{ $article->title }}</h1>
        <div class="d-flex gap-3">
            @if($showMeta)
                <p class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-location-dot"></i>{{ $article->city }}
                </p>
                <p>|</p>
            @endif
            <a href="{{ route('article.byCategory', $article->category) }}"
               class="fst-italic fw-bold fs-6 text-decoration-none text-body">{{ __("ui.{$article->category->name}") }}</a>
        </div>

        <p class="my-2">{{ $article->description }}</p>

        @if($showMeta)
            <p class="mt-3">
                <span class="fw-bold">{{ __('ui.availableForDelivery') }}:</span>
                @if($article->delivery_shipping)
                    {{ __('ui.yes')}}
                @else
                    {{ __('ui.no')}}
                @endif
            </p>
        @endif

        <p class="fw-bold text-primary fs-4 mt-3">{{ $article->price }} €</p>
    </div>
