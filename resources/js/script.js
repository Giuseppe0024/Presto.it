document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('nav.navbar');
    const sentinel = document.getElementById('search-sentinel');

    if (!navbar || !sentinel) return;

    const observer = new IntersectionObserver(
        ([entry]) => navbar.classList.toggle('search-attached', entry.isIntersecting),
        {rootMargin: `-${navbar.offsetHeight}px 0px 0px 0px`}
    );

    observer.observe(sentinel);
});

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('become-revisor-form');
    const button = document.getElementById('become-revisor-submit');

    if (!form || !button) return;

    form.addEventListener('submit', () => {
        button.disabled = true;
        button.textContent = 'Invio in corso...';
    });
});

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
    }, {once: true});
}