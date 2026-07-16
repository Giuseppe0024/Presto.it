<x-layouts.app>
    <div class="container">
        <div class="my-5 text-center">
            <h1>Revisor Dashboard</h1>
        </div>

        @if($article_to_check)
            <x-ui.alerts/>

            <div class="my-5 p-4 p-md-5 card-login rounded-5">


                <div class="row g-4 g-lg-5 justify-content-center">
                    <div class="col-12 col-lg-6">
                        <x-revisor.image-review :images="$article_to_check->images" :title="$article_to_check->title"/>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="text-start mb-4">
                            Pubblicato da <span class="fw-bolder">{{ $article_to_check->user->name }}</span>
                        </p>
                        <x-article.details :article="$article_to_check"/>
                        <x-revisor.accept-reject
                                :accept-action="route('revisor.accept', $article_to_check)"
                                :reject-action="route('revisor.reject', $article_to_check)"/>
                    </div>
                </div>
            </div>
        @elseif($revision_to_check)
            <x-ui.alerts/>

            <div class="my-5 p-4 p-md-5 card-login rounded-5">

                <div class="alert alert-warning rounded-3" role="alert">
                    <i class="fa-solid fa-pen-to-square me-2"></i>
                    Modifica a un annuncio già online. La versione attuale resta pubblicata finché non decidi.
                </div>

                <div class="row g-4 g-lg-5 justify-content-center">
                    <div class="col-12 col-lg-6">
                        <x-revisor.image-review
                                :images="$revision_to_check->proposedImages()"
                                :title="$revision_to_check->title"/>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="text-start mb-4">
                            Pubblicato da <span class="fw-bolder">{{ $article_to_check->user->name }}</span>
                        </p>
                        <x-article.details :article="$article_to_check"/>
                        <x-revisor.accept-reject
                                :accept-action="route('revisor.accept', $article_to_check)"
                                :reject-action="route('revisor.reject', $article_to_check)"/>
                    </div>
                </div>
            </div>
        @elseif($revision_to_check)
            <x-ui.alerts/>

            <div class="my-5 p-4 p-md-5 card-login rounded-5">

                <div class="alert alert-warning rounded-3" role="alert">
                    <i class="fa-solid fa-pen-to-square me-2"></i>
                    Modifica a un annuncio già online. La versione attuale resta pubblicata finché non decidi.
                </div>

                <div class="row g-4 g-lg-5 justify-content-center">
                    <div class="col-12 col-lg-6">
                        <x-revisor.image-review
                                :images="$revision_to_check->proposedImages()"
                                :title="$revision_to_check->title"/>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="text-start mb-4">
                            Modificato da <span class="fw-bolder">{{ $revision_to_check->article->user->name }}</span>
                        </p>
                        <x-article.details :article="$revision_to_check"/>
                        <x-revisor.accept-reject
                                :accept-action="route('revisor.acceptRevision', $revision_to_check)"
                                :reject-action="route('revisor.rejectRevision', $revision_to_check)"
                                :token="$revision_to_check->token"/>
                        <p class="text-start mb-4">
                            Modificato da <span class="fw-bolder">{{ $revision_to_check->article->user->name }}</span>
                        </p>
                        <x-article.details :article="$revision_to_check"/>
                        <x-revisor.accept-reject
                                :accept-action="route('revisor.acceptRevision', $revision_to_check)"
                                :reject-action="route('revisor.rejectRevision', $revision_to_check)"
                                :token="$revision_to_check->token"/>
                    </div>
                </div>
            </div>
        @else
            <x-ui.empty-state>Non ci sono articoli da revisionare.</x-ui.empty-state>
        @endif
    </div>

</x-layouts.app>
