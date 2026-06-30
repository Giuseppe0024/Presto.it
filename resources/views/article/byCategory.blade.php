<x-layouts.app>
    <section class="container my-5">

        <div class="mb-4">
            <h1>{{ $category->name }}</h1>
            <p class="mb-0">Tutti gli annunci nella categoria {{ $category->name }}.</p>
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
                            <p class="text-muted mb-0">Oops! <br> Non ci sono ancora annunci in questa categoria.</p>
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
