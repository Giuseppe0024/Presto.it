<!--                     <ul class="navbar-nav">
                        <li class="nav-item dropdown ps-1 ps-lg-0">
                            <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="fa-solid fa-earth-americas text-greymasala me-1"></i>
                                IT
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">IT</a></li>
                                <li><a class="dropdown-item" href="#">EN</a></li>
                                <li><a class="dropdown-item" href="#">FR</a></li>
                            </ul>
                        </li>
                    </ul> -->

<form action="{{ route( 'setLocale', $lang ) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/country-'.$lang.'.svg')}}" width="32" height="32">
    </button>
</form>