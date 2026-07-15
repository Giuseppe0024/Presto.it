<x-layouts.app>
    <section class="container my-5">

        <div class="mb-4">
            <h1>{{ $category->name }}</h1>
            <p class="mb-0">Tutti gli annunci nella categoria {{ __("ui.{$category->name}") }}.</p>
        </div>

        <x-article.grid :articles="$articles">{{ __('ui.noArticles')}}</x-article.grid>

    </section>
</x-layouts.app>
