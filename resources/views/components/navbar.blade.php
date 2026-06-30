<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm {{ $showSearch ? 'search-attached' : '' }}">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homepage') }}">
            <span class="stonegreen-color">Presto</span><span class="orange-color">.it</span>
        </a>

        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mainOffcanvas"
                aria-controls="mainOffcanvas"
                aria-label="Apri il menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="mainOffcanvas" aria-labelledby="mainOffcanvasLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas"
                        aria-label="Chiudi"></button>
            </div>

            <div class="offcanvas-body">
                @auth
                    <x-navbar.menu-auth/>
                @else
                    <x-navbar.menu-guest/>
                @endauth

                {{-- Selettore lingua --}}
                <div class="dropdown ms-lg-2 mt-3 mt-lg-0 ps-1 ps-lg-0">
                    <button class="btn dropdown-toggle px-0 px-lg-2" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa-solid fa-earth-americas text-greymasala me-1"></i>
                        IT
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">IT</a></li>
                        <li><a class="dropdown-item" href="#">EN</a></li>
                        <li><a class="dropdown-item" href="#">FR</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- Ricerca --}}
<x-navbar.search-bar :show="$showSearch"/>
