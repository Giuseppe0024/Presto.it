<div class="d-flex justify-content-center justify-content-lg-start gap-3 mt-4">
    <form action="{{ route('revisor.reject', $article) }}" method="POST">
        @csrf
        @method('PATCH')
        <button class="btn btn-outline-primary px-4">
            <i class="fa-solid fa-xmark me-2"></i>Rifiuta
        </button>
    </form>

    <form action="{{ route('revisor.accept', $article) }}" method="POST">
        @csrf
        @method('PATCH')
        <button class="btn btn-secondary px-4">
            <i class="fa-solid fa-check me-2"></i>Accetta
        </button>
    </form>
</div>
