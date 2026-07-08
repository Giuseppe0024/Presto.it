{{-- desktop --}}
<ul class="navbar-nav d-none d-lg-flex align-items-lg-center">

    <li class="nav-item ps-1 ps-lg-0">
        {{--    sarebbe meglio spostare la logica di active nel controller della navbar // anche perché al momento lo usiamo solo per l'index degli articoli O_O"    --}}
        <a class="nav-link text-nowrap {{ request()->routeIs('article.index') ? 'active' : '' }}"
           href="{{ route('article.index') }}">
            <i class="fa-solid fa-list text-greymasala me-1"></i>
            {{ __('ui.allArticles') }}
        </a>
    </li>

    <li class="nav-item dropdown ps-1 ps-lg-0">
        <button class="btn nav-link dropdown-toggle text-nowrap" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
            <i class="fa-solid fa-grip text-greymasala me-1"></i>
            {{ __( 'ui.categories' )}}
        </button>
        <ul class="dropdown-menu">
            @foreach($categories as $category)
                <li>
                    <a class="dropdown-item" href="{{ route('article.byCategory', $category) }}">
                        {{ __("ui.{$category->name}") }}
                    </a>
                </li>
                @if(!$loop->last)
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                @endif
            @endforeach
        </ul>
    </li>

</ul>

{{-- mobile --}}
<div class="d-lg-none">

    <a class="nav-link {{ request()->routeIs('article.index') ? 'active' : '' }}"
       href="{{ route('article.index') }}">
        <i class="fa-solid fa-list text-greymasala me-2"></i>
        {{ __('ui.allArticles') }}
    </a>

    <hr class="my-3">

    <h6 class="text-greymasala text-uppercase small fw-semibold mb-2">{{ __('ui.categories')}}</h6>
    <ul class="navbar-nav">
        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.byCategory', $category) }}">
                </a>
                {{ __("ui.{$category->name}") }}
            </li>
        @endforeach
    </ul>

</div>
