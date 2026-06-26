<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homepage') }}">
            <span class="stonegreen-color">Presto</span><span class="orange-color">.it</span>
        </a>

        <!-- ICONE DA MOBILE -->

        <div class="d-flex justify-content-end d-lg-none">

            <!-- barra di ricerca mobile -->
    
            <button class="btn nav-link px-2" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fa-solid fa-magnifying-glass icon-mobile"></i>
            </button>

            <!-- preferiti mobile -->

            <a href="#" class="nav-link px-2" data-bs-toggle="modal" data-bs-target="#favoritesModal">
                <i class="fa-solid fa-carrot icon-mobile"></i>
            </a>

            <!-- user mobile -->

            <button class="btn nav-link px-2" data-bs-toggle="modal" data-bs-target="#profileModal">
                <i class="fa-regular fa-user icon-mobile"></i>
            </button>
        </div>

        <!-- MENU MOBILE --> 
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- SINISTRA -->
        <div class="collapse navbar-collapse d-flex " id="navbarSupportedContent">

            <!-- MENU DESKTOP - SINISTRA -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link {{ request()->routeIs('comefunziona') ? 'active' : '' }}" href="#">
                        Come funziona
                    </a>
                </li>

                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link {{ request()->routeIs('categorie') ? 'active' : '' }}" href="#">
                        Categorie
                    </a>
                </li>

                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link {{ request()->routeIs('annunci') ? 'active' : '' }}" href="#">
                        Annunci vicino a te
                    </a>
                </li>

            </ul>

            <!-- MENU MOBILE E DESKTOP - DESTRA -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                @guest

                    <!-- MENU MOBILE NON LOGGATO -->
                    <li class="nav-item d-lg-none">
                        <a class="nav-link active" href="#">
                            Come funziona
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            Crea un annuncio
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            Annunci vicino a te
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href=" {{ route('login') }} ">
                            <i class="fa-regular fa-user me-1"></i>
                            Accedi
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="btn btn-outline-success" href=" {{ route('register') }} ">
                            Registrati
                        </a>
                    </li>

                @endguest

                @auth

                    <!-- DESKTOP LOGGATO -->
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-carrot me-1" style="color: rgb(86, 81, 75);"></i>
                            Preferiti
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-envelope me-1"></i>
                            Messaggi
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-cart-shopping me-1"></i>
                            Carrello
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-user me-1"></i>
                            Profilo
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <form method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">
                                <i class="fa-solid fa-sign-out-alt me-1"></i>
                                Logout
                            </button>
                        </form>
                    </li>

                    <!-- MENU MOBILE LOGGATO -->
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-user me-1"></i>
                            Profilo
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-carrot me-1" style="color: rgb(86, 81, 75);"></i>
                            Preferiti
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            I miei annunci
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            I miei ordini
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <form method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">
                                <i class="fa-solid fa-sign-out-alt me-1"></i>
                                Logout
                            </button>
                        </form>
                    </li>

                @endauth

            </ul>

        </div>


    </div>
</nav>


<!-- BARRA DI RICERCA -->

@if (!request()->routeIs('login', 'register'))

<div class="container d-none d-lg-block my-3">
    <form action="search" method="GET" class="d-flex align-items-center border rounded p-2 shadow-sm">
        
        <input type="text" name="query" class="form-control border-0" placeholder="Cosa stai cercando?">
        
        <div class="vr mx-2"></div> 
        
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorie
            </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">categoria 1</a></li>
            <li><a class="dropdown-item" href="#">categoria 2</a></li>
            <li><a class="dropdown-item" href="#">categoria 3</a></li>
            <li><a class="dropdown-item" href="#">categoria 4</a></li>
            <li><a class="dropdown-item" href="#">categoria 5</a></li>
            <li><a class="dropdown-item" href="#">categoria 6</a></li>
            <li><a class="dropdown-item" href="#">categoria 7</a></li>
            <li><a class="dropdown-item" href="#">categoria 8</a></li>
            <li><a class="dropdown-item" href="#">categoria 9</a></li>
            <li><a class="dropdown-item" href="#">categoria 10</a></li>
        </ul>
</div>
<div class="vr mx-2"></div> <div class="d-flex align-items-center px-2">
        <i class="fa-solid fa-location-dot me-2"></i>
        <input type="text" class="form-control border-0" placeholder="Tutta italia">
</div>

        <button class="btn btn-orange ms-2 px-4" type="submit">Cerca</button>
    </form>
</div>

@endif

<!-- MODALE CERCA MOBILE -->

<div class="modal" tabindex="-1" id="searchModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cerca un articolo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="search" method="GET">
            <input type="text" name="query" class="form-control mb-2" placeholder="Cosa stai cercando?">
            <div class="dropdown mb-2">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </button>
            <div class="mb-2"></div> <div class="d-flex align-items-center px-2">
                <i class="fa-solid fa-location-dot me-2"></i>
                <input type="text" class="form-control border-0" placeholder="Tutta italia">
            </div>
            <div class="mb-2">
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">categoria 1</a></li>
                    <li><a class="dropdown-item" href="#">categoria 2</a></li>
                    <li><a class="dropdown-item" href="#">categoria 3</a></li>
                    <li><a class="dropdown-item" href="#">categoria 4</a></li>
                    <li><a class="dropdown-item" href="#">categoria 5</a></li>
                    <li><a class="dropdown-item" href="#">categoria 6</a></li>
                    <li><a class="dropdown-item" href="#">categoria 7</a></li>
                    <li><a class="dropdown-item" href="#">categoria 8</a></li>
                    <li><a class="dropdown-item" href="#">categoria 9</a></li>
                    <li><a class="dropdown-item" href="#">categoria 10</a></li>
                </ul>
            </div>
            </div>
            <div class="mb-2">
            <button class="btn btn-orange mt-2" type="submit">Cerca</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODALE PREFERITI MOBILE -->

<div class="modal" tabindex="-1" id="favoritesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preferiti</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <p>Qui puoi visualizzare i tuoi articoli preferiti.</p>
        </div>
    </div>
  </div>
</div>

<!-- MODALE ACCEDI/REGISTRATI/PROFILO -->

<div class="modal mb-5" tabindex="-1" id="profileModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Accedi o Registrati</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <p>Accedi al tuo account o registrati per iniziare a utilizzare Presto.it.</p>
        </div>
            <div class="nav-item d-lg-block d-flex justify-content-center mb-5">
                <a class="btn btn-outline-success" href=" {{ route('register') }} ">
                    Registrati
                </a>
                <a class="btn btn-orange ms-2" href=" {{ route('login') }} ">
                    Accedi
                </a>
            </div>

    </div>
  </div>
  