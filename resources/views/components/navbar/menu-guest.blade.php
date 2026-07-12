{{-- desktop --}}
<ul class="navbar-nav d-none d-lg-flex align-items-lg-center">

    <li class="nav-item">
        <a class="nav-link text-nowrap {{ request()->routeIs('howItWorks') ? 'active' : '' }}" href="{{ route('howItWorks') }}">
            {{ __('ui.howItWorks') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-nowrap" href="{{ route('login') }}">{{ __('ui.login') }}</a>
    </li>

{{-- rimosso button registrati --}}

</ul>

{{-- mobile --}}
<div class="d-lg-none">
    <ul class="navbar-nav mb-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('howItWorks') ? 'active' : '' }}" href="{{ route('howItWorks') }}">
                <i class="fa-solid fa-circle-question me-2"></i> {{ __('ui.howItWorks') }}
            </a>
        </li>
    </ul>

    <hr class="my-3">

{{-- rimosso button registrati --}}

    <a class="nav-link mt-3" href="{{ route('login') }}">
        <i class="fa-solid fa-right-to-bracket me-2"></i> {{ __('ui.login') }}
    </a>
</div>
