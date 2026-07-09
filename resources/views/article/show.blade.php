<x-layouts.app>

    <div class="container">
        <div class="my-5 p-4 p-md-5 card-login rounded-5">
            <div class="text-center">
                <p class="d-inline">Pubblicato da</p>
                <address class="fw-bolder d-inline">{{ $article->user->name }}</address>
            </div>

            <div class="row g-5 mt-1">
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start align-items-md-center">
                    <x-article.carousel :article="$article"/>
                </div>

                <div class="col-12 col-md-6">
                    <x-article.details :article="$article"/>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
