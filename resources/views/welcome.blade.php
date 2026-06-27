<x-layout>


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