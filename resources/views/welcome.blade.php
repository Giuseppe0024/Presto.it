<x-layout>


<!-- HERO -->


<section class="my-5 card-login shadow px-5">
    <div class="row align-items-center ">

        <div class="col-12 col-md-4 mb-4 mb-lg-0 container d-flex flex-column align-items-start justify-content-center">
            <h2>Trova occasioni. <br>
               <span class="text-titlegreen">Dai nuova vita alle tue cose.</span></h2>
            <p>
                Compra e vendi di persona o con spedizione in tutta Italia.
            </p>
            <a href="{{route ('article.create') }}" class="btn btn-orange rounded-pill">
                Crea un annuncio
            </a>
        </div>

        <div class="col-12 col-md-8">
           <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/hero_img_01.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/hero_img_02.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/hero_img_03.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>

    </div>
</section>

<!-- CARD PER VISUALIZZARE GLI ANNUNCI -->


<section class="container my-5">
    <div class="row align-items-center">

        <div class="col-12 col-lg-3 mb-4 mb-lg-0">
            <h3>Scopri gli ultimi annunci</h3>
            <p>
                Sfoglia le occasioni più recenti pubblicate su Presto.it.
            </p>
            <a href="#" class="btn btn-green rounded-pill">
                Vedi tutti
            </a>
        </div>

        <div class="col-12 col-lg-9">
            <div class="d-flex gap-3 overflow-auto pb-3"> 
                <!-- "overflow-auto" permette lo scroll orizzontale -->

                <div class="card article-card flex-shrink-0 border-0 rounded-4 overflow-hidden" style="width: 280px;">
                    <img src="https://picsum.photos/300/200" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Bicicletta vintage</h5>
                        <p class="mb-1 fst-italic">Sport</p>
                        <p class="fw-bold text-orange mb-3">120 €</p>
                        <a href="{{ route('article') }}" class="btn btn-orange btn-sm rounded-pill">
                            Vai all'annuncio
                        </a>
                    </div>
                </div>
                
                

            </div>
        </div>

    </div>
</section>

</x-layout>