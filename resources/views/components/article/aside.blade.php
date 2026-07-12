<div class="card-login border-0 rounded-5 p-4 w-100 h-100">
    <div class="d-flex align-items-center gap-3 mb-4">

        <div
            class="rounded-circle bg-body d-flex align-items-center justify-content-center flex-shrink-0"
            style="width: 55px; height: 55px;"
        >
            <i class="fa-solid fa-user fs-4"></i>
        </div>

        <div>
            <p class="text-muted mb-1 small">
                Venduto da
            </p>

            <h5 class="fw-bold mb-1">
                {{ $article->user->name }}
            </h5>

            <p class="text-muted mb-0">
                <i class="fa-solid fa-location-dot me-1"></i>
                {{ $article->city }}
            </p>
        </div>
    </div>

    <div class="d-grid gap-2">
        <a
            href="#"
            class="btn btn-primary rounded-pill fw-semibold"
        >
            <i class="fa-solid fa-message me-2"></i>
            Contatta il venditore
        </a>

        <button
            type="button"
            class="btn btn-secondary rounded-pill fw-semibold"
        >
            <i class="fa-solid fa-carrot me-2"></i>
            Aggiungi ai preferiti
        </button>
    </div>

    <hr class="my-4">

    <div class="mb-4">
        <p class="fw-bold mb-2">
            <i class="fa-solid fa-truck me-2"></i>
            Consegna
        </p>

        <p class="text-muted mb-0">
            @if ($article->delivery_shipping)
                Disponibile per la spedizione
            @else
                Solo consegna a mano
            @endif
        </p>
    </div>

    <div class="bg-light rounded-3 p-3">
        <p class="fw-bold small mb-1">
            <i class="fa-solid fa-shield-halved me-1"></i>
            Acquista in sicurezza
        </p>

        <p class="text-muted small mb-0">
            Non inviare pagamenti anticipati fuori dalla piattaforma.
            In caso di consegna a mano, incontra il venditore in un luogo pubblico.
        </p>
    </div>
</div>