<x-layouts.app>
    <div class="container">
        <div class="my-5 text-center">
            <h1>Revisor Dashboard</h1>
        </div>

        @if($article_to_check)
            <x-article-show :article="$article_to_check"/>
        @else
            <x-empty-state>Non ci sono articoli da revisionare.</x-empty-state>
        @endif

    </div>

</x-layouts.app>