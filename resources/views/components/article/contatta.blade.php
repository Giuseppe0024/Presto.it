@props(['article'])

@php
    $modalId = 'contactSellerModal-' . $article->id;
@endphp

<div
    class="modal fade"
    id="{{ $modalId }}"
    tabindex="-1"
    aria-labelledby="{{ $modalId }}Label"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content contact-seller-content border-0 rounded-5 shadow p-4">

            <div class="modal-header border-0 align-items-start">

                <div>
                    <h3
                        class="modal-title fw-bold"
                        id="{{ $modalId }}Label">
                        {{ __('ui.contactTheSeller') }}
                    </h3>

                    <p class="text-muted mb-0 fs-6">
                        {{ __('ui.to') }} {{ $article->user->name }}
                    </p>
                </div>

                {{-- Pulsante di chiusura della modale --}}

                <button
                    type="button"
                    class="btn-close contact-close-button"
                    data-bs-dismiss="modal"
                    aria-label="{{ __('ui.close') }}"></button>

            </div>

            
            <div id="contactSellerForm-{{ $article->id }}">

            
                <div class="modal-body">

                    <div class="mb-3">
                        <label
                            for="subject-{{ $article->id }}"
                            class="form-label fw-semibold">
                            {{ __('ui.subject') }}
                        </label>

                        <input
                            type="text"
                            class="form-control rounded-pill"
                            id="subject-{{ $article->id }}"
                            name="subject"
                            placeholder="{{ __('ui.subjectPlaceholder') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label
                            for="message-{{ $article->id }}"
                            class="form-label fw-semibold">
                            {{ __('ui.message') }}
                        </label>

                        <textarea
                            class="form-control rounded-3"
                            id="message-{{ $article->id }}"
                            name="message"
                            rows="5"
                            placeholder="{{ __('ui.messagePlaceholder') }}"></textarea>
                    </div>

                </div>

  
                <div class="modal-footer border-0">

                    <button
                        type="button"
                        class="btn btn-primary rounded-pill fw-semibold"
                        data-bs-dismiss="modal">
                        {{ __('ui.cancel') }}
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary rounded-pill px-4 fw-semibold"
                        onclick="simulaInvioContatta('{{ $article->id }}')">
                        {{ __('ui.send') }}
                    </button>

                </div>

            </div>

            <div
                class="modal-body d-none"
                id="contactSellerSuccess-{{ $article->id }}">
                <div class="text-center py-4">
                    <i class="fa-solid fa-circle-check text-success fs-1 mb-3"></i>

                    <h5 class="fw-bold">
                        {{ __('ui.messageSent') }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ __('ui.messageSentDetail') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function simulaInvioContatta(articleId) {
    document.getElementById('contactSellerForm-' + articleId).classList.add('d-none');
    document.getElementById('contactSellerSuccess-' + articleId).classList.remove('d-none');

    var modalEl = document.getElementById('contactSellerModal-' + articleId);
    setTimeout(function () {
        bootstrap.Modal.getInstance(modalEl).hide();
    }, 2000);

    modalEl.addEventListener('hidden.bs.modal', function () {
        document.getElementById('contactSellerForm-' + articleId).classList.remove('d-none');
        document.getElementById('contactSellerSuccess-' + articleId).classList.add('d-none');
    }, { once: true });
}
</script>

