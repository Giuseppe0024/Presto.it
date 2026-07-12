
<x-layouts.app>
<x-navbar.search-bar :show="true" />

    <div class="container py-5">

        {{-- Introduzione --}}
        <header class="text-center mb-5">
            <p class="text-primary fw-semibold mb-2">
                Semplice, veloce e sostenibile
            </p>

            <h1 class="fw-bold mb-3">
                Come funziona Presto.it?
            </h1>

            <p class="text-muted mx-auto mb-0" style="max-width: 720px;">
                Vendi ciò che non usi più, trova articoli di seconda mano
                e mettiti direttamente in contatto con gli altri utenti.
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
                            Vendi o acquista un articolo
                        </h2>

                        <p class="text-muted">
                            Hai qualcosa che non utilizzi più? Scatta alcune foto,
                            inserisci una descrizione chiara, scegli la categoria
                            e indica il prezzo a cui vuoi venderlo.
                        </p>

                        <p class="text-muted mb-0">
                            Stai cercando qualcosa? Esplora gli annunci, consulta
                            le categorie e scopri gli articoli pubblicati dagli
                            altri utenti.
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
                            Contatta il venditore
                        </h2>

                        <p class="text-muted">
                            Quando trovi un articolo che ti interessa, contatta
                            direttamente il venditore per chiedere ulteriori
                            informazioni, verificare le condizioni dell’articolo
                            e concordare il prezzo.
                        </p>

                        <p class="text-muted mb-0">
                            Acquirente e venditore possono poi scegliere il metodo di consegna: a mano o spedizione.

                            Si sconsigliano metodi di pagamento difficili da verificare e si raccomanda di non condividere dati personali non necessari (come il numero di telefono o la password). 
                            
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
                            Spedisci o incontra
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
                Pronto per iniziare?
            </h2>

            <p class="text-muted mb-4">
                Crea il tuo primo annuncio oppure scopri gli articoli disponibili.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                @auth
                    <a
                        href="{{ route('article.create') }}"
                        class="btn btn-primary rounded-pill px-4 py-2 fw-semibold"
                    >
                        <i class="fa-solid fa-plus me-2"></i>
                        Crea il tuo primo annuncio
                    </a>
                @endauth

                <a
                    href="{{ route('article.index') }}"
                    class="btn btn-secondary rounded-pill px-4 py-2 fw-semibold"
                >
                    Esplora gli annunci
                </a>
            </div>
        </section>

    </div>


</x-layouts.app>
