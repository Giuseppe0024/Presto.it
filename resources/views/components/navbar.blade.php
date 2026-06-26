<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homepage') }}">
            Presto.it
        </a>

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

            <!-- MENU DESKTOP - SINISTRA -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link active" href="#">
                        Come funziona
                    </a>
                </li>

                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link" href="#">
                        Categorie
                    </a>
                </li>

                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link" href="#">
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
                            Categorie
                        </a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            Annunci vicino a te
                        </a>
                    </li>

                    <li class="nav-item">
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

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href=" {{ route('register') }} ">
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