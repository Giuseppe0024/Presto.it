<x-alerts/>
<div class="my-5 p-4 p-md-5 card-login rounded-5">
    <div class="text-center">
        {{--  user  --}}
        <p class="d-inline">Pubblicato da</p>
        <address class="fw-bolder d-inline">{{ $article->user->name }}</address>

    </div>

    @if($article->is_accepted === null)
        <div class="d-flex  justify-content-center ">
            <p class="bg-info-subtle px-3 py-2 rounded-2">Articolo in stato di verifica</p>
        </div>
    @endif

    <div class="row g-5 mt-1">

        <!-- COLONNA SINISTRA / CAROSELLO -->

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start align-items-md-center ">

            @if($article->images->count())
                <div id="carouselExampleIndicators" class="carousel slide hero-carousel " data-bs-ride="carousel">

                    @if($article->images->count() > 1)
                        <div class="carousel-indicators">
                            @foreach($article->images as $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $loop->index }}"
                                        @if($loop->first) class="active" @endif>

                                </button>
                            @endforeach
                        </div>
                    @endif


                    <div class="carousel-inner rounded-4 overflow-hidden">
                        @foreach($article->images as $key => $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src="{{ Storage::url($image->path) }}" class="d-block hero-carousel-img"
                                     alt="Immagine {{$key + 1}} dell'articolo {{$article->title}}">
                            </div>
                        @endforeach
                    </div>


                    @if($article->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    @endif
                </div>
            @else
                <div class="w-100 h-100 rounded-4 bg-body-secondary d-flex align-items-center justify-content-center p-5">
                    <i class="fa-solid fa-thumbtack-slash fs-5"></i>
                </div>
            @endif
        </div>

        <!-- COLONNA DESTRA -->

        <div class="col-12 col-md-6">

            <h1 class="">{{ $article->title }}</h1>
            <p class="fst-italic fs-6">{{ $article->category->name }}</p>

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