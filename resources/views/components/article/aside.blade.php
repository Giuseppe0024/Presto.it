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
                {{ __('ui.soldBy') }}
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

    {{-- Contatta venditore --}}

    <div class="d-grid gap-2">
    @auth
        <button
            type="button"
            class="btn btn-primary rounded-pill fw-semibold"
            data-bs-toggle="modal"
            data-bs-target="#contactSellerModal-{{ $article->id }}">

            <i class="fa-solid fa-message me-2"></i>
            {{ __('ui.contactTheSeller') }}

        </button>
    @else
        <a
            href="{{ route('login') }}"
            class="btn btn-primary rounded-pill fw-semibold">
            <i class="fa-solid fa-message me-2"></i>
            {{ __('ui.contactTheSeller') }}
        </a>
    @endauth

        <livewire:favorite-button
            :article="$article"
            variant="aside"
            :key="'favorite-aside-'.$article->id"/>

            
    </div>

    <hr class="my-4">

    <div class="mb-4">
        <p class="fw-bold mb-2">
            <i class="fa-solid fa-truck me-2"></i>
            {{ __('ui.delivery') }}
        </p>

        <p class="text-muted mb-0">
            @if ($article->delivery_shipping)
                {{ __('ui.availableForShipping') }}
            @else
                {{ __('ui.localPickupOnly') }}
            @endif
        </p>
    </div>

    <div class="bg-light rounded-3 p-3">
        <p class="fw-bold small mb-1">
            <i class="fa-solid fa-shield-halved me-1"></i>
            {{ __('ui.shopSafely') }}
        </p>

        <p class="text-muted small mb-0">
            {{__('ui.doNotSendAdvancePaymentsOutsideThePlatform')}}
        </p>
    </div>
</div>

<x-article.contatta :article="$article"/>