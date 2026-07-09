<x-alerts/>
<div class="my-5 p-4 p-md-5 card-login rounded-5">
    <div class="text-center">
        {{--  user  --}}
        <p class="d-inline">Pubblicato da</p>
        <address class="fw-bolder d-inline">{{ $article->user->name }}</address>

    </div>

    <div class="row g-5 mt-1">

        <!-- COLONNA SINISTRA / CAROSELLO -->

        <x-revisor-carousel :article="$article"/>

        <!-- COLONNA DESTRA -->

        <div class="col-12 col-md-6">


            <h1 class="">{{ $article->title }}</h1>
            <div class="d-flex gap-3">
                <p class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-location-dot"></i>{{ $article->city }}
                </p>
                <p>|</p>
                <p class="fst-italic fw-bold fs-6">{{ $article->category->name }}</p>
            </div>

            



            <!-- descrizione -->


            <p class="my-2">{{ $article->description }}</p>

            {{--  delivery --}}

            <p class="mt-3">
                <span class="fw-bold">Disponibile alla consegna:</span>
                @if($article->delivery_shipping)
                    Sì
                @else
                    No
                @endif
            </p>

            <!-- prezzo -->

            <p class="fw-bold text-primary fs-4 mt-3">{{ $article->price }} €</p>
        </div>

        {{-- Buttons --}}

        @if(@auth()->user()->is_revisor && $article->is_accepted === null)
            <div class="col mt-5 d-flex justify-content-center gap-4">
                <form action="{{ route('revisor.reject', $article) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-primary">Rifiuta</button>
                </form>

                <form action="{{ route('revisor.accept', $article) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-secondary">Accetta</button>
                </form>
            </div>
        @endif
    </div>


</div>

@if(@auth()->user()->is_revisor && $article->is_accepted === null)
                                @if($image->lables)
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                    @foreach($image->lables as $label)
                                        <span class="badge rounded-pill text-bg-secondary m-1">#{{ $label }}</span>
                                    @endforeach
                                    </div>
                                @else
                                <span class="badge rounded-pill text-bg-secondary m-1">Nessuna etichetta</span>

                                @endif

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="card-body p-2">
                                            <h5 class="card-title">Ratings</h5>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <p class="text-center mx-auto">{{ $image->adult }}</p>
                                                </div>
                                                 <p class="col-10">Adult</p>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <p class="text-center mx-auto">{{ $image->violence }}</p>
                                                </div>
                                                 <p class="col-10">Violence</p>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <p class="text-center mx-auto">{{ $image->spoof }}</p>
                                                </div>
                                                 <p class="col-10">Spoof</p>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <p class="text-center mx-auto">{{ $image->racy }}</p>
                                                </div>
                                                 <p class="col-10">Racy</p>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <p class="text-center mx-auto">{{ $image->medical }}</p>
                                                </div>
                                                 <p class="col-10">Medical</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                             @endif