<div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
    @forelse($image->labels ?? [] as $label)
        <span class="badge rounded-pill text-bg-secondary">#{{ $label }}</span>
    @empty
        <span class="badge rounded-pill text-bg-light">Nessuna etichetta</span>
    @endforelse
</div>

<hr class="my-3">

@if($image->adult)
    <div class="row row-cols-3 row-cols-sm-5 g-3 justify-content-center text-center">
        <div class="col d-flex flex-column align-items-center gap-1">
            <i class="{{ $image->adult }} fs-5"></i>
            <p class="small text-uppercase mb-0">Adult</p>
        </div>

        <div class="col d-flex flex-column align-items-center gap-1">
            <i class="{{ $image->violence }} fs-5"></i>
            <p class="small text-uppercase mb-0">Violence</p>
        </div>

        <div class="col d-flex flex-column align-items-center gap-1">
            <i class="{{ $image->spoof }} fs-5"></i>
            <p class="small text-uppercase mb-0">Spoof</p>
        </div>

        <div class="col d-flex flex-column align-items-center gap-1">
            <i class="{{ $image->racy }} fs-5"></i>
            <p class="small text-uppercase mb-0">Racy</p>
        </div>

        <div class="col d-flex flex-column align-items-center gap-1">
            <i class="{{ $image->medical }} fs-5"></i>
            <p class="small text-uppercase mb-0">Medical</p>
        </div>
    </div>
@else
    <p class="small fst-italic text-center mb-0">
        Analisi non ancora disponibile — <a href="{{ request()->fullUrl() }}" class="link-secondary">ricarica la
            pagina</a>
    </p>
@endif
