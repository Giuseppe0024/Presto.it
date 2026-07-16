<x-layouts.app>
    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>{{ __('ui.myListings') }}</h1>
                <p class=" mb-0">
                    {{ __('ui.manageListings') }}
                </p>
            </div>

            <a href="{{ route('article.create') }}" class="btn btn-primary rounded-pill px-4">
                + {{ __('ui.newListing') }}
            </a>
        </div>

        <x-ui.alerts/>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-lg-4">
                    <x-article.owner-card :article="$article"/>
                </div>
            @empty
                <div class="col-12">
                    <x-ui.empty-state>{{ __('ui.noListingsYet') }}</x-ui.empty-state>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>