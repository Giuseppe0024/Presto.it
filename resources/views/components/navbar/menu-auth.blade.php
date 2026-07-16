@php use App\Models\Article; @endphp
{{-- desktop --}}
<ul class="navbar-nav d-none d-lg-flex align-items-lg-center">

    <li class="nav-item">
        <a class="nav-link text-nowrap" href="{{ route('howItWorks') }}">
            {{ __('ui.howItWorks')}}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-nowrap" href="{{ route('article.create') }}">
            <i class="fa-solid fa-plus me-1"></i>
            {{ __('ui.createArticle')}}
        </a>
    </li>

    <li class="nav-item dropdown">
        <button class="btn nav-link dropdown-toggle text-nowrap position-relative" type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
            <i class="fa-regular fa-user me-1"></i>
            {{ __('ui.profile')}} {{ auth()->user()->name }}
            {{--
                        @if(\App\Models\Article::toBeRevisedCount() > 0)
                            <span class="position-absolute top-0 start-100 badge translate-middle rounded-pill bg-danger text-white">

                            </span>
                        @endif
            --}}

        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item dropdown-style" href="{{ route('favorites.index') }}">
                    <i class="fa-solid fa-carrot me-2"></i> {{ __('ui.favorites') }}
                </a>
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-regular fa-comment-dots me-2"></i> {{ __('ui.messages') }}
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="{{ route('article.myArticles') }}">
                    <i class="fa-solid fa-rectangle-list me-2"></i> {{ __('ui.myListings') }}
                </a>
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-solid fa-bag-shopping me-2"></i> {{ __('ui.myOrders') }}
                </a>
            </li>
            <li>
                <a class="dropdown-item dropdown-style" href="#">
                    <i class="fa-solid fa-gear me-2"></i> {{ __('ui.settings') }}
                </a>
            </li>
            @if(auth()->user()->is_revisor)
                <li>
                    <a class="dropdown-item dropdown-style d-flex align-items-center"
                       href="{{ route('revisor.index') }}">
                        <i class="fa-solid fa-user-check me-2"></i> {{ __('ui.reviews') }}
                        @if(Article::toBeRevisedCount())
                            <span class="small badge rounded-pill bg-danger text-white ms-1">
                            {{ Article::toBeRevisedCount() }}
                        </span>
                        @endif
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
                        <i class="fa-solid fa-sign-out-alt me-2"></i> Logout
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
                <i class="fa-solid fa-plus me-2"></i> {{ __('ui.createArticle')}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('favorites.index') }}">
                <i class="fa-solid fa-carrot me-2"></i> {{ __('ui.favorites') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-regular fa-comment-dots me-2"></i> {{ __('ui.messages') }}
            </a>
        </li>
    </ul>

    <hr class="my-3">

    <h6 class="text-body text-uppercase small fw-semibold mb-2"> {{ __('ui.profile')}} </h6>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article.myArticles') }}">
                <i class="fa-solid fa-rectangle-list me-2"></i> {{ __('ui.myListings') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-bag-shopping me-2"></i> {{ __('ui.myOrders') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear me-2"></i> {{ __('ui.settings') }}
            </a>
        </li>
        @if(auth()->user()->is_revisor)
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('revisor.index') }}">
                    <i class="fa-solid fa-user-check me-2"></i> {{ __('ui.reviews') }}
                    @if(Article::toBeRevisedCount())
                        <span class="small badge rounded-pill bg-danger text-white ms-1">
                            {{ Article::toBeRevisedCount() }}
                        </span>
                    @endif
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
