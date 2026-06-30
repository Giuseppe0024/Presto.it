<x-layouts.app>
    <section class="container my-5">

        <div class="mb-4">
            <h1>Tutti gli annunci</h1>
            <p class="mb-0">Sfoglia tutte le occasioni pubblicate su Presto.it.</p>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-6 col-md-4 col-lg-3">
                    <x-article-card :article="$article" fluid/>
                </div>
            @empty
                <div class="col-12">
                    <div class="card bg-secondary-subtle border-0 rounded-4 overflow-hidden">
                        <div class="card-body">
                            <p class="text-muted mb-0">Oops! <br> Sembra non ci siano ancora annunci... Crea il primo!</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $articles->links() }}
        </div>

    </section>
</x-layouts.app>
