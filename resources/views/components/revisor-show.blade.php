<x-alerts/>

<div class="my-5 p-4 p-md-5 card-login rounded-5">
    <p class="text-center mb-4">
        Pubblicato da <span class="fw-bolder">{{ $article->user->name }}</span>
    </p>

    <div class="row g-4 g-lg-5 justify-content-center">
        <div class="col-12 col-lg-6">
            <x-article.revisor-images :article="$article"/>
        </div>

        <div class="col-12 col-lg-6">
            <x-article.body :article="$article"/>
            <x-article.accept-reject :article="$article"/>
        </div>
    </div>
</div>
