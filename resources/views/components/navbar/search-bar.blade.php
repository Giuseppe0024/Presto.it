@props(['show' => false])

{{-- Ricerca --}}
@if ($show)

    {{-- Desktop --}}
    <div class="container d-none d-lg-block mt-5">
        <form method="GET" action="#" class="search-pill d-flex align-items-center border rounded-5 p-2 shadow-sm">

            <i class="fa-solid fa-magnifying-glass ms-3"></i>
            <input type="text" name="q" value="{{ old('q') }}"
                   class="form-control border-0 rounded-5" placeholder="Cosa stai cercando?">

            <div class="vr mx-2"></div>

            <div class="dropdown flex-shrink-0">
                <button class="btn dropdown-toggle search-btn" type="button" data-bs-toggle="dropdown">Categorie
                </button>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="vr mx-2"></div>

            <div class="d-flex align-items-center px-2 flex-shrink-0">
                <i class="fa-solid fa-location-dot me-2"></i>
                <input type="text" name="city" value="{{ old('city') }}"
                       class="form-control border-0 w-auto" placeholder="Tutta Italia">
            </div>

            <button class="btn btn-orange ms-2 px-4 rounded-5 flex-shrink-0 search-btn" type="submit">Cerca</button>

        </form>
    </div>

    {{-- Mobile --}}
    <div class="d-lg-none bg-body-tertiary shadow-sm">
        <div class="container pt-2 pb-3">
            <form method="GET" action="#" class="d-flex flex-column gap-2">

                {{-- ricerca --}}
                <div class="search-pill d-flex align-items-center border rounded-5 px-3 py-2">
                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                    <input type="text" name="q" value="{{ old('q') }}"
                           class="form-control border-0 bg-transparent p-0" placeholder="Cosa stai cercando?">
                </div>

                {{-- categoria e città --}}
                <div class="d-flex gap-2">
                    <div class="dropdown flex-fill">
                        <button class="btn border rounded-5 w-100 d-flex align-items-center justify-content-between dropdown-toggle search-btn"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-truncate"><i class="fa-solid fa-list-ul me-2"></i>Categorie</span>
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="search-pill d-flex align-items-center flex-fill border rounded-5 px-3 py-2">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <input type="text" name="city" value="{{ old('city') }}"
                               class="form-control border-0 bg-transparent p-0" placeholder="Tutta Italia">
                    </div>
                </div>

                {{-- cerca --}}
                <button class="btn btn-orange rounded-5 px-4 align-self-end search-btn" type="submit">Cerca</button>

            </form>
        </div>
    </div>

@endif
