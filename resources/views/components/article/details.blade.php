    <div>
        <h1 class="">{{ $article->title }}</h1>
        <div class="d-flex gap-3">
            <p class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-location-dot"></i>{{ $article->city }}
            </p>
            <p>|</p>
            <p class="fst-italic fw-bold fs-6">{{ $article->category->name }}</p>
        </div>

        <p class="my-2">{{ $article->description }}</p>

        <p class="mt-3">
            <span class="fw-bold">Disponibile alla consegna:</span>
            @if($article->delivery_shipping)
                Sì
            @else
                No
            @endif
        </p>

        <p class="fw-bold text-primary fs-4 mt-3">{{ $article->price }} €</p>
    </div>


