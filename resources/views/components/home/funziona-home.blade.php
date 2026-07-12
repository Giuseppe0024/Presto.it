<section class="container py-4">

    <div class="text-center mb-5">
        <h2 class="fw-bold mb-3">
            {{ __('ui.howItWorks') }} Presto.it
        </h2>
        <p class="text-secondary fw-semibold mb-2">
            {{ __('ui.howItWorksDescription') }}
        </p>

    </div>

    <div class="row g-4">

        {{-- Pubblica --}}
        <div class="col-12 col-md-4 d-flex">
            <article class="card card-how rounded-5 p-4 text-center w-100 h-100">

                <div class="mb-4">
                    <img
                        src=" img/ComeFunziona/Carica.png"
                        alt="Pubblica un articolo"
                        class="img-fluid"
                        style="height: 170px; width: 100%; object-fit: contain;"
                    >
                </div>

                <h3 class="fs-4 fw-bold mb-3">
                    {{ __('ui.publish')}}
                </h3>

                <p class="text-muted mb-0">
                    {{ __('ui.publishDescription') }}
                </p>

            </article>
        </div>

        {{-- Contatta --}}
        <div class="col-12 col-md-4 d-flex">
            <article class="card card-how  rounded-5 p-4 text-center w-100 h-100">

                <div class="mb-4">
                    <img
                        src=" img/ComeFunziona/Contatta.png"
                        alt="Contatta il venditore"
                        class="img-fluid"
                        style="height: 170px; width: 100%; object-fit: contain;"
                    >
                </div>

                <h3 class="fs-4 fw-bold mb-3">
                    {{ __('ui.contactSeller') }}
                </h3>

                <p class="text-muted mb-0">
                    {{ __('ui.contactSellerDescription') }}
                </p>

            </article>
        </div>

        {{-- Concludi --}}
        <div class="col-12 col-md-4 d-flex">
            <article class="card card-how rounded-5 p-4 text-center w-100 h-100">

                <div class="mb-4">
                    <img
                        src=" img/ComeFunziona/spedisci.png"
                        alt="Spedizione o consegna a mano"
                        class="img-fluid"
                        style="height: 170px; width: 100%; object-fit: contain;"
                    >
                </div>

                <h3 class="fs-4 fw-bold mb-3">
                    {{ __('ui.shipOrMeet') }}
                </h3>

                <p class="text-muted mb-0">
                    {{ __('ui.shipOrMeetDescription') }}
                </p>

            </article>
        </div>

    </div>

</section>