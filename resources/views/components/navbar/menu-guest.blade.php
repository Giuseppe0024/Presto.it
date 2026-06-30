<ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0 align-items-lg-center">


    <li class="nav-item ps-1 ps-lg-0">
        <a class="nav-link text-nowrap {{ request()->routeIs('comefunziona') ? 'active' : '' }}" href="#">Come
            funziona</a>
    </li>

    <li class="nav-item ps-1 ps-lg-0">
        <a class="nav-link text-nowrap {{ request()->routeIs('annunci') ? 'active' : '' }}" href="#">Annunci vicino a
            te</a>
    </li>

    <li class="nav-item px-2 d-none d-lg-block">|</li>
    
    <li class="nav-item ps-1 ps-lg-0">
        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
    </li>

    <li class="nav-item mt-2 mt-lg-0 ms-lg-2">
        <a class="btn btn-outline-success" href="{{ route('register') }}">Registrati</a>
    </li>

</ul>
