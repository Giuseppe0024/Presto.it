<section class="container my-5">
    <div class="row align-items-center">

        <div class="col-12 col-lg-3 mb-4 mb-lg-0 pe-lg-3 ">
            <h3>Scopri gli ultimi annunci</h3>
            <p>Sfoglia le occasioni più recenti pubblicate su Presto.it.</p>
            <a href="{{ route('article.index') }}" class="btn btn-secondary rounded-pill">Vedi tutti</a>
        </div>

        {{-- "overflow-auto" permette lo scroll orizzontale degli annunci --}}
        <div class="col-12 col-lg-9 py-3 overflow-auto">
            <div class="d-flex gap-4">
                @forelse($articles as $article)
                    <x-article-card :article="$article"/>
                @empty
                    <div>
                        <x-empty-state fixed>Sembra non ci siano ancora annunci... Crea il primo!</x-empty-state>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</section>
