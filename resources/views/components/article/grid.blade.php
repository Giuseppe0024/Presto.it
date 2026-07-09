@props(['articles'])

<div class="row g-4">
    @forelse($articles as $article)
        <div class="col-6 col-md-4 col-lg-3">
            <x-article.card :article="$article" fluid/>
        </div>
    @empty
        <div class="col-12">
            <x-ui.empty-state>{{ $slot }}</x-ui.empty-state>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-5">
    {{ $articles->links() }}
</div>
