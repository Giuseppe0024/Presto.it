<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm {{ $showSearch ? 'search-attached' : '' }}">
    <div class="container">

        {{-- mobile hamburger di navigazione (sinistra) --}}
        <button class="navbar-toggler border-0 d-lg-none me-1"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#browseOffcanvas"
                aria-controls="browseOffcanvas"
                aria-label="Apri il menu di navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('homepage') }}">
            <span class="text-secondary">Presto</span><span class="text-primary">.it</span>
        </a>

        {{-- mobile menu utente (destra) --}}
        <button class="navbar-toggler border-0 d-lg-none ms-auto"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#userOffcanvas"
                aria-controls="userOffcanvas"
                aria-label="Apri il menu utente">
            <i class="fa-regular fa-user fs-5"></i>
        </button>

        {{-- sinistra --}}
        <div class="offcanvas offcanvas-start flex-lg-grow-0" tabindex="-1" id="browseOffcanvas"
             aria-labelledby="browseOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="browseOffcanvasLabel"> {{ __('ui.browse') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Chiudi"></button>
            </div>
            <div class="offcanvas-body">
                <x-navbar.menu-browse/>
            </div>
        </div>

        {{-- destra --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="userOffcanvas" aria-labelledby="userOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="userOffcanvasLabel">Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Chiudi"></button>
            </div>
            <div class="offcanvas-body justify-content-lg-end">
                <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3">

                    @auth
                        <x-navbar.menu-auth/>
                    @else
                        <x-navbar.menu-guest/>
                    @endauth

                    {{-- Selettore lingua --}}

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ps-1 ps-lg-0">

                            <button class="btn nav-link dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">

                                <i class="fa-solid fa-earth-americas me-1"></i>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-end text-end" style="min-width: 0;">
                                <li>
                                    <x-navbar.locale-flag lang="it"/>
                                </li>
                                <li>
                                    <x-navbar.locale-flag lang="uk"/>
                                </li>
                                <li>
                                    <x-navbar.locale-flag lang="es"/>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</nav>

{{-- Ricerca --}}
<x-navbar.search-bar :show="$showSearch"/>
