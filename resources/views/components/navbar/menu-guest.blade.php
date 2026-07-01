{{-- desktop --}}
<ul class="navbar-nav d-none d-lg-flex align-items-lg-center">

    <li class="nav-item">
        <a class="nav-link text-nowrap {{ request()->routeIs('comefunziona') ? 'active' : '' }}" href="#">
            Come funziona
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-nowrap" href="{{ route('login') }}">Accedi</a>
    </li>

    <li class="nav-item ms-lg-2">
        <a class="btn btn-outline-success text-nowrap" href="{{ route('register') }}">Registrati</a>
    </li>
</ul>

{{-- mobile --}}
<div class="d-lg-none">
    <ul class="navbar-nav mb-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('comefunziona') ? 'active' : '' }}" href="#">
                <i class="fa-solid fa-circle-question text-greymasala me-2"></i> Come funziona
            </a>
        </li>
    </ul>

    <hr class="my-3">


    <a class="btn btn-outline-success" href="{{ route('register') }}">Registrati</a>

    <a class="nav-link mt-3" href="{{ route('login') }}">
        <i class="fa-solid fa-right-to-bracket text-greymasala me-2"></i> Accedi
    </a>
</div>
