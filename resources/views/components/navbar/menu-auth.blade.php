{{-- desktop --}}
<ul class="navbar-nav d-none d-lg-flex align-items-lg-center">

    <li class="nav-item">
        <a class="nav-link text-nowrap" href="{{ route('article.create') }}">
            <i class="fa-solid fa-plus text-greymasala me-1"></i>
            Crea annuncio
        </a>
    </li>

    <li class="nav-item dropdown">
        <button class="btn nav-link dropdown-toggle text-nowrap" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
            <i class="fa-regular fa-user text-greymasala me-1"></i>
            Profilo
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-solid fa-carrot text-greymasala me-2"></i> Preferiti
                </a>
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-regular fa-comment-dots text-greymasala me-2"></i> Messaggi
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="{{ route('article.myArticles') }}">
                    <i class="fa-solid fa-rectangle-list text-greymasala me-2"></i> I miei annunci
                </a>
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-solid fa-bag-shopping text-greymasala me-2"></i> I miei ordini
                </a>
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-solid fa-gear text-greymasala me-2"></i> Impostazioni
                </a>
            </li>
            @if(auth()->user()->is_revisor)
                <li>
                    <a class="dropdown-item dropdown-style" href="{{ route('revisor.index') }}">
                        <i class="fa-solid fa-user-check text-greymasala me-2"></i> Area Revisore
                    </a>
                </li>
            @endif
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fa-solid fa-sign-out-alt text-greymasala me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>
</ul>

{{-- mobile --}}
<div class="d-lg-none">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article.create') }}">
                <i class="fa-solid fa-plus text-greymasala me-2"></i> Crea annuncio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-carrot text-greymasala me-2"></i> Preferiti
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-regular fa-comment-dots text-greymasala me-2"></i> Messaggi
            </a>
        </li>
    </ul>

    <hr class="my-3">

    <h6 class="text-greymasala text-uppercase small fw-semibold mb-2">Profilo</h6>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article.myArticles') }}">
                <i class="fa-solid fa-rectangle-list text-greymasala me-2"></i> I miei annunci
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-bag-shopping text-greymasala me-2"></i> I miei ordini
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear text-greymasala me-2"></i> Impostazioni
            </a>
        </li>
        @if(auth()->user()->is_revisor)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('revisor.index') }}">
                    <i class="fa-solid fa-user-check text-greymasala me-2"></i> Area Revisore
                </a>
            </li>
        @endif
    </ul>

    <hr class="my-3">

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-secondary w-100">
            <i class="fa-solid fa-sign-out-alt me-2"></i> Logout
        </button>
    </form>
</div>
