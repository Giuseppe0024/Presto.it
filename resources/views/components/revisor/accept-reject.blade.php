@props(['acceptAction', 'rejectAction', 'token' => null])

<div class="d-flex justify-content-center justify-content-lg-start gap-3 mt-4">
    <form action="{{ $rejectAction }}" method="POST">
        @csrf
        @method('PATCH')
        @if($token)
            <input type="hidden" name="token" value="{{ $token }}">
        @endif
        <button class="btn btn-primary px-4">
            <i class="fa-solid fa-xmark me-2"></i>{{ __('ui.reject') }}
        </button>
    </form>

    <form action="{{ $acceptAction }}" method="POST">
        @csrf
        @method('PATCH')
        @if($token)
            <input type="hidden" name="token" value="{{ $token }}">
        @endif
        <button class="btn btn-secondary px-4">
            <i class="fa-solid fa-check me-2"></i>{{ __('ui.accept')}}
        </button>
    </form>
</div>
