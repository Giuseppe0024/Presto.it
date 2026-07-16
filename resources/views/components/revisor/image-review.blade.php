@props(['images', 'title'])

<div class="d-flex flex-column gap-4">
    @forelse($images as $key => $image)
        <div class="revisor-card rounded-4 shadow-sm p-3 p-md-4">
            <p class="small text-uppercase fw-bold mb-2">
                Immagine {{ $key + 1 }} di {{ $images->count() }}
            </p>

            <div class="ratio ratio-4x3 rounded-3 overflow-hidden bg-body-secondary">
                <img src="{{ $image->getUrl(400, 300) }}" class="object-fit-contain w-100 h-100"
                     alt="Immagine {{ $key + 1 }} dell'articolo {{ $title }}">
            </div>

            <x-revisor.image-analysis :image="$image"/>
        </div>
    @empty
        <div class="bg-body rounded-4 shadow-sm d-flex flex-column align-items-center justify-content-center gap-2 p-5">
            <i class="fa-solid fa-thumbtack-slash fs-4"></i>
            <p class="mb-0">Nessuna immagine caricata</p>
        </div>
    @endforelse
</div>
