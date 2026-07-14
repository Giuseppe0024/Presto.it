
<x-layouts.app>
<x-navbar.search-bar :show="true" />

    <div class="container py-5">

        {{-- Introduzione --}}
        <header class="text-center mb-5">
            <p class="text-primary fw-semibold mb-2">
                {{ __('ui.howItWorksDescription') }}
            </p>

            <h1 class="fw-bold mb-3">
                {{ __('ui.howItWorks') }} Presto.it?
            </h1>

            <p class="text-muted mx-auto mb-0" style="max-width: 720px;">
                {{ __('ui.howItWorksDetails') }}
            </p>
        </header>



        <section class="d-flex flex-column gap-5">

            {{-- PUBBLICA --}}
            <article class="card-how border-0 rounded-5 overflow-hidden">
                <div class="row g-0 align-items-center">

                    <div class="col-12 col-lg-5 p-4 p-lg-5 text-center">
                        <img
                            src="img/ComeFunziona/Carica.png"
                            class="img-fluid"
                            style="max-height: 300px; object-fit: contain;"
                        >
                    </div>

                    <div class="col-12 col-lg-7 p-4 p-lg-5">

                        <h2 class="fw-bold mb-3">
                            {{ __('ui.sellOrBuyArticle') }}
                        </h2>

                        <p class="text-muted">
                            {{__('ui.sellOrBuyArticleDetails_01')}}
                        </p>

                        <p class="text-muted mb-0">
                            {{ __('ui.sellOrBuyArticleDetails_02') }}
                        </p>
                    </div>

                </div>
            </article>


            {{-- CONTATTA --}}
            <article class="card-how border-0 rounded-5 overflow-hidden">
                <div class="row g-0 align-items-center">

                    <div class="col-12 col-lg-5 order-lg-2 p-4 p-lg-5 text-center">
                        <img
                            src="img/ComeFunziona/Contatta.png"
                            class="img-fluid"
                            style="max-height: 300px; object-fit: contain;"
                        >
                    </div>

                    <div class="col-12 col-lg-7 order-lg-1 p-4 p-lg-5">
                        <h2 class="fw-bold mb-3">
                            {{ __('ui.contactSeller') }}
                        </h2>

                        <p class="text-muted">
                            {{ __('ui.contactSellerDetails_01') }}
                        </p>

                        <p class="text-muted mb-0">
                            {{ __('ui.contactSellerDetails_02') }}
                            
                        </p>
                    </div>

                </div>
            </article>


            {{-- CONCLUDI --}}
            <article class="card-how border-0 rounded-5 overflow-hidden">
                <div class="row g-0 align-items-center">

                    <div class="col-12 col-lg-5 p-4 p-lg-5 text-center">
                        <img
                            src="img/ComeFunziona/spedisci.png"
                            class="img-fluid"
                            style="max-height: 300px; object-fit: contain;"
                        >
                    </div>

                    <div class="col-12 col-lg-7 p-4 p-lg-5">

                        <h2 class="fw-bold mb-3">
                            {{ __('ui.shipOrMeet') }}
                        </h2>

                        <p class="text-muted">
                            Scegliete insieme la modalità più comoda: in caso di spedizione il venditore dovrà imballare l’articolo in modo sicuro per garantire la sua integrità e spedirlo all’indirizzo fornito dall’acquirente.
                        </p>

                        <p class="text-muted mb-0">
                            In alternativa, potete accordarvi per incontrarvi di
                            persona in un luogo pubblico e completare lo scambio
                            di persona.

                        </p>
                    </div>

                </div>
            </article>

        </section>


        <section class="text-center mt-5">
            <h2 class="fw-bold mb-3">
                {{ __('ui.startNow') }}
            </h2>

            <p class="text-muted mb-4">
                {{ __('ui.startNowDescription') }}
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                @auth
                    <a
                        href="{{ route('article.create') }}"
                        class="btn btn-primary rounded-pill px-4 py-2 fw-semibold"
                    >
                        <i class="fa-solid fa-plus me-2"></i>
                        {{ __('ui.createYourFirstArticle') }}
                    </a>
                @endauth

                <a
                    href="{{ route('article.index') }}"
                    class="btn btn-secondary rounded-pill px-4 py-2 fw-semibold"
                >
                    {{ __('ui.exploreArticles') }}
                </a>
            </div>
        </section>

    </div>


</x-layouts.app>
