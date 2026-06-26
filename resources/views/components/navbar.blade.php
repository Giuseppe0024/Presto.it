<nav class="navbar navbar-expand-md bg-body-tertiary ">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homepage') }}">
            <span class="stonegreen-color">Presto</span><span class="orange-color">.it</span>
        </a>

        <!-- ICONE DA MOBILE -->
         <!-- collegate alle modali in fondo -->

            <div class="d-flex justify-content-end d-md-none">

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
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- MENU DESKTOP E MOBILE -->
            <ul class="navbar-nav ms-auto mb-2 mb-md-0 align-items-md-center">
                
                @guest
                    <!-- Voci visibili sia su mobile che desktop -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('comefunziona') ? 'active' : '' }}" href="#">Come funziona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('crea-annuncio') ? 'active' : '' }}" href="#">Crea un annuncio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('annunci') ? 'active' : '' }}" href="#">Annunci vicino a te</a>
                    </li>
                    
                    <!-- Separatore visibile solo su desktop -->
                    <li class="nav-item d-none d-md-block px-2">|</li>

                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="btn btn-outline-success" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest

            </ul>

                @auth

                    <!-- DESKTOP LOGGATO -->
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 align-items-md-center">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-carrot me-1" style="color: rgb(86, 81, 75);"></i>
                            Preferiti
                        </a>
                    </li>

                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-envelope me-1"></i>
                            Messaggi
                        </a>
                    </li>

                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-cart-shopping me-1"></i>
                            Carrello
                        </a>
                    </li>

                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-user me-1"></i>
                            Profilo
                        </a>
                    </li>

                    <li class="nav-item d-none d-md-block">
                        <form method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link">
                                <i class="fa-solid fa-sign-out-alt me-1"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>

                    <!-- MENU MOBILE LOGGATO -->
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 align-items-md-center">
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-user me-1"></i>
                            Profilo
                        </a>
                    </li>

                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-carrot me-1" style="color: rgb(86, 81, 75);"></i>
                            Preferiti
                        </a>
                    </li>

                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">
                            I miei annunci
                        </a>
                    </li>

                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">
                            I miei ordini
                        </a>
                    </li>

                    <li class="nav-item d-md-none">
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

    <div class="container d-none d-md-block my-3">
        <form method="GET"
              class="d-flex align-items-center border rounded-5 p-2 shadow-sm">

            <input type="text" class="form-control border-0" placeholder="Cosa stai cercando?">

            <div class="vr mx-2"></div>

            <div class="dropdown flex-shrink-0">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" >
                    Categorie
                </button>

                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item" href="#">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="vr mx-2"></div>

            <div class="d-flex align-items-center px-2 flex-shrink-0">
                <i class="fa-solid fa-location-dot me-2"></i>

                <input type="text" class="form-control border-0 w-auto" placeholder="Tutta Italia">
            </div>

            <button class="btn btn-orange ms-2 px-4 rounded-5 flex-shrink-0" type="submit" >
                Cerca
            </button>

        </form>
    </div>

@endif
  
<!-- MODALI MOBILE -->

    <!-- MODALE PROFILO -->
    <div class="modal fade" id="profileModal" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Accedi o Registrati</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Accedi al tuo account o registrati per iniziare a utilizzare Presto.it.</p>

                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <a class="btn btn-outline-success" href="{{ route('register') }}">
                            Registrati
                        </a>

                        <a class="btn btn-orange" href="{{ route('login') }}">
                            Accedi
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- MODALE RICERCA -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Cerca un articolo</h5>
                </div>

                <div class="modal-body">
                    <form action="search" method="GET">

                        <input type="text" class="form-control mb-3 rounded-5" placeholder="Cosa stai cercando?">

                        <div class="dropdown mb-3">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Categorie
                            </button>

                            <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="#">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                            </ul>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-location-dot me-2"></i>

                            <input type="text" class="form-control rounded-5" placeholder="Tutta Italia">
                        </div>

                        <button class="btn btn-orange rounded-5" type="submit">
                            Cerca
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- MODALE PREFERITI -->
    <div class="modal fade" id="favoritesModal" tabindex="-1" aria-labelledby="favoritesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Preferiti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Qui puoi visualizzare i tuoi articoli preferiti.</p>
                </div>

            </div>
        </div>
    </div>