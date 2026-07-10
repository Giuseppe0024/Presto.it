<x-layouts.app>
    <div class="container">
        <div class="my-5 text-center">
            <h1>Revisor Dashboard</h1>
        </div>

        @if($article_to_check)
            <x-ui.alerts/>

            <div class="my-5 p-4 p-md-5 card-login rounded-5">
                <p class="text-center mb-4">
                    Pubblicato da <span class="fw-bolder">{{ $article_to_check->user->name }}</span>
                </p>

                <div class="row g-4 g-lg-5 justify-content-center">
                    <div class="col-12 col-lg-6">
                        <x-revisor.image-review :article="$article_to_check"/>
                    </div>

                    <div class="col-12 col-lg-6">
                        <x-article.details :article="$article_to_check"/>
                        <x-revisor.accept-reject :article="$article_to_check"/>
                    </div>
                </div>
            </div>
        @else
            <x-ui.empty-state>Non ci sono articoli da revisionare.</x-ui.empty-state>
        @endif
    </div>

</x-layouts.app>
