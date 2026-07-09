<x-layouts.app>
    <section class="container my-5">

        <div class="mb-4">
            <h1>{{ $category->name }}</h1>
            <p class="mb-0">Tutti gli annunci nella categoria {{ $category->name }}.</p>
        </div>

        <x-article.grid :articles="$articles">Non ci sono ancora annunci in questa categoria.</x-article.grid>

    </section>
</x-layouts.app>
