<x-layouts.app>


    <div class="container">
        <div class="my-5 p-4 p-md-5 card-login rounded-5">
            <div class="text-center">
                {{--  user  --}}
                <p class="d-inline">Pubblicato da</p>
                <address class="fw-bolder d-inline">{{ $article->user->name }}</address>
            </div>

            <x-success/>

            <div class="row g-5 mt-1">

                <!-- COLONNA SINISTRA / CAROSELLO -->

                <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start ">

                    <div id="carouselExampleIndicators" class="carousel slide hero-carousel " data-bs-ride="carousel">

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="2"></button>
                        </div>

                        <div class="carousel-inner rounded-4 overflow-hidden">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/300/300" class="d-block hero-carousel-img" alt="">
                            </div>

                            <div class="carousel-item">
                                <img src="https://picsum.photos/300/300" class="d-block hero-carousel-img" alt="">
                            </div>

                            <div class="carousel-item">
                                <img src="https://picsum.photos/300/300" class="d-block hero-carousel-img" alt="">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>

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

            </div>
        </div>
    </div>

</x-layouts.app>