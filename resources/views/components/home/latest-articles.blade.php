<section class="container my-5">
    <div class="row align-items-center">

        <div class="col-12 col-lg-3 mb-4 mb-lg-0 pe-lg-3 ">
            <div class="row">
                <div class="col-8 col-lg-12 d-flex flex-column justify-content-end">
                    <h3>{{ __('ui.latestArticles') }}</h3>
                    <p class="mb-0 mb-lg-3">{{ __('ui.browseLatestArticles') }}</p>
                </div>
                <div class="col-4 col-lg-12 d-flex justify-content-end align-items-end d-lg-block">
                    <span>
                    <a href="{{ route('article.index') }}"
                       class="btn btn-sm btn-outline-secondary">{{ __('ui.viewAll') }}</a>
                    </span>
                </div>
            </div>
        </div>

        {{-- "overflow-auto" permette lo scroll orizzontale degli annunci --}}
        <div class="col-12 col-lg-9 py-3 overflow-auto">
            <div class="d-flex gap-4">
                @forelse($articles as $article)
                    <x-article-preview :article="$article"/>
                @empty
                    <div>
                        <x-empty-state fixed>{{ __('ui.noArticlesYet') }}</x-empty-state>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>