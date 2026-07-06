<section class="mb-5 mt-0 card-login shadow py-5">
    <div class="container">
        <div class="row align-items-center justify-content-around">

            <div class="col-12 col-md-4  mb-lg-0  d-flex flex-column align-items-start">
                <h2>
                    Trova occasioni. <br>
                    <span class="text-secondary">Dai nuova vita alle tue cose.</span>
                </h2>
                <p>Compra e vendi di persona o con spedizione in tutta Italia.</p>
                @auth
                    <a href="{{ route('article.create') }}" class="btn btn-secondary">
                        Crea un annuncio
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-secondary">
                        Registrati e vendi
                    </a>
                @endauth
            </div>

            <div class="col-12 col-md-8 justify-content-between d-flex align-items-center">
                <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/hero_img_01.png" class="d-block w-75 mx-auto" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/hero_img_02.png" class="d-block w-75 mx-auto" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="img/hero_img_03.png" class="d-block w-75 mx-auto" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev p-5" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="prev">
                        <i class="fa-solid fa-circle-chevron-left fs-1" style="color: rgb(167, 184, 154);"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next p-5" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="next">
                        <i class="fa-solid fa-circle-chevron-right fs-1" style="color: rgb(167, 184, 154);"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
