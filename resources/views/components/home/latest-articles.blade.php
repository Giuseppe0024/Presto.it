<section class="container my-5">
    <div class="row align-items-center">

        <div class="col-12 col-lg-3 mb-4 mb-lg-0 pe-lg-3 ">
            <h3>Scopri gli ultimi annunci</h3>
            <p>Sfoglia le occasioni più recenti pubblicate su Presto.it.</p>
            <a href="#" class="btn btn-green rounded-pill">Vedi tutti</a>
        </div>

        {{-- "overflow-auto" permette lo scroll orizzontale degli annunci --}}
        <div class="col-12 col-lg-9 py-3 overflow-auto">
            <div class="d-flex gap-4">
                @forelse($articles as $article)
                    <x-article-card :article="$article"/>
                @empty
                    <div>
                        <div class="card article-card flex-shrink-0 border-0 rounded-4 overflow-hidden"
                             style="width: 280px;">
                            <img src="https://picsum.photos/300/200" class="card-img-top" alt="">
                            <div class="card-body">
                                <h3>Nono sono ancora stati creati articoli.</h3>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</section>
