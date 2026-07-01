document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('nav.navbar');
    const sentinel = document.getElementById('search-sentinel');

    if (!navbar || !sentinel) return;

    const observer = new IntersectionObserver(
        ([entry]) => navbar.classList.toggle('search-attached', entry.isIntersecting),
        { rootMargin: `-${navbar.offsetHeight}px 0px 0px 0px` }
    );

    observer.observe(sentinel);
});
