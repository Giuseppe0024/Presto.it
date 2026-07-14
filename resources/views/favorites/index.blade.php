<x-layouts.app>
    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>I miei preferiti</h1>

                <p class="mb-0">
                    Qui trovi tutti gli annunci che hai salvato.
                </p>
            </div>
        </div>

        <x-ui.alerts/>

        <div class="row g-4">
            @forelse ($favorites as $article)
                <div class="col-6 col-md-4 col-lg-3">
                    <x-article.card
                        :article="$article"
                        fluid
                    />
                </div>
            @empty
                <div class="col-12">
                    <x-ui.empty-state>
                        Non hai ancora aggiunto nessun annuncio ai preferiti.
                    </x-ui.empty-state>
                </div>
            @endforelse
        </div>

        @if ($favorites->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $favorites->links() }}
            </div>
        @endif

    </div>
</x-layouts.app>