<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>I miei annunci</h1>
                <p class=" mb-0">
                    Gestisci gli annunci che hai pubblicato su Presto.it
                </p>
            </div>

            <a href="{{ route('article.create') }}" class="btn btn-orange rounded-pill px-4">
                + Nuovo annuncio
            </a>
        </div>

    
    <div class="row g-4">
        <div class="col-12 col-sm-6 col-lg-4">
        <div class="card article-card rounded-4 overflow-hidden h-100 d-flex justify-content-around border-0">
            <img src="https://picsum.photos/500/350" class="card-img-top article-card-img" alt="Annuncio">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-green">Modifica</a>
                    <a href="#" class="btn btn-orange">Elimina</a>
                </div>
        </div>
        </div>
    </div>

        </div>
    </div>
</x-layout>