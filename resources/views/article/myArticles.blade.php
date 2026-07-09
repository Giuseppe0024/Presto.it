<x-layouts.app>
    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>I miei annunci</h1>
                <p class=" mb-0">
                    Gestisci gli annunci che hai pubblicato su Presto.it
                </p>
            </div>

            <a href="{{ route('article.create') }}" class="btn btn-primary rounded-pill px-4">
                + Nuovo annuncio
            </a>
        </div>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-lg-4">
                    <x-article.owner-card :article="$article"/>
                </div>
            @empty
                <div class="col-12">
                    <x-ui.empty-state>Non hai ancora pubblicato nessun annuncio.</x-ui.empty-state>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>