@props(['article'])

@if($article->is_accepted === null)
    <div class="card-header d-flex justify-content-center border-0">
        <p class="bg-info-subtle px-3 py-2 mb-0 rounded-2">Annuncio in stato di verifica</p>
    </div>
@elseif($article->is_accepted === 0)
    <div class="card-header d-flex justify-content-center border-0">
        <p class="bg-primary-subtle px-3 py-2 mb-0 rounded-2">Annuncio rifiutato</p>
    </div>
@elseif($article->is_accepted === 1)
    <div class="card-header d-flex justify-content-center border-0">
        <p class="bg-success-subtle px-3 py-2 mb-0 rounded-2">Annuncio online</p>
    </div>
@endif
