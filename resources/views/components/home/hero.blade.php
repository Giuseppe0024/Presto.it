<section class="mb-5 mt-0 mt-lg-5 card-login shadow py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12 col-md-4 mb-4 mb-lg-0 d-flex flex-column align-items-start justify-content-center">
                <h2>
                    Trova occasioni. <br>
                    <span class="text-titlegreen">Dai nuova vita alle tue cose.</span>
                </h2>
                <p>Compra e vendi di persona o con spedizione in tutta Italia.</p>
                @auth
                    <a href="{{ route('article.create') }}" class="btn btn-orange rounded-pill">
                        Crea un annuncio
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-orange rounded-pill">
                        Registrati e vendi
                    </a>
                @endauth
            </div>

            <div class="col-12 col-md-8">
                <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/hero_img_01.png" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/hero_img_02.png" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/hero_img_03.png" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
