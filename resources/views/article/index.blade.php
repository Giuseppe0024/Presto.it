<x-layouts.app>
    <section class="container my-5">

        <div class="mb-4">
            <h1>Tutti gli annunci</h1>
            <p class="mb-0">Sfoglia tutte le occasioni pubblicate su Presto.it.</p>
        </div>

        <x-article.grid :articles="$articles">Sembra non ci siano ancora annunci... Crea il primo!</x-article.grid>

    </section>
</x-layouts.app>
