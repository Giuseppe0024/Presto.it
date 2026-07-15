<x-layouts.app>
    <section class="container my-5">

        <div class="mb-4">
            <h1>{{ __('ui.allArticles') }}</h1>
            <p class="mb-0">{{ __('ui.browseAllDealsPublishedOnPresto.it.')}}</p>
        </div>

        <x-article.grid :articles="$articles">{{ __('ui.noArticles') }}</x-article.grid>

    </section>
</x-layouts.app>
