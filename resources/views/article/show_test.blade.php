<x-layout>


    <div class="container mt-5 py-5 card-login rounded-5 stonegreen-color">
        <div class="text-center">
            <h1 class="mt-4 text-center">Articolo</h1>
            <p class="mb-1 fst-italic fs-6">Categoria</p>
        </div>

        <x-success/>

        <div class="row g-5 m-4">

            <!-- COLONNA SINISTRA / CAROSELLO -->

            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start ">

                <div id="carouselExampleIndicators" class="carousel slide hero-carousel " data-bs-ride="carousel">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
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


                <!-- descrizione -->


                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. A, nisi. Aperiam voluptate in
                    veritatis alias, facere non libero repudiandae animi rem labore deleniti quidem reiciendis earum.
                    Sequi maiores officia eaque repellendus, ab voluptas vero sint consequatur dolorum magni harum nemo
                    explicabo placeat, error at deserunt recusandae necessitatibus atque incidunt reprehenderit est
                    nisi? Animi doloremque, reprehenderit tempore eum cupiditate sequi maxime incidunt odit? Expedita
                    laudantium, eligendi quaerat necessitatibus dolorem, autem vel repellat a odit assumenda, at illum
                    iste inventore voluptas modi! Suscipit laboriosam quo non quas, voluptas quibusdam! Enim dolorem
                    omnis cum a, eum velit nesciunt laboriosam veniam suscipit ducimus minima.</p>

                <!-- condizioni -->

                <p class="mt-3"><span class="fw-bold">Condizioni:</span> Nuovo</p>

                <!-- prezzo -->

                <p class="fw-bold text-orange fs-4 mt-3">120 €</p>


            </div>

        </div>

    </div>

</x-layout>