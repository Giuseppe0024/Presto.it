@props(['show' => false])

{{-- Ricerca --}}
@if ($show)

    <div id="search-extension" class="bg-body-tertiary">

        <div id="search-sentinel"></div>

        {{-- Desktop --}}
        <div class="container d-none d-lg-block py-4">
            <form method="GET" role="search" action="{{ route('article.search') }}"
                  class="search-pill d-flex align-items-center border rounded-5 p-2 shadow-sm">

                <i class="fa-solid fa-magnifying-glass ms-3"></i>
                <input type="text" name="query" value="{{ old('q') }}"
                       class="form-control border-0 rounded-5" placeholder="Cosa stai cercando?">

                <div class="vr mx-2"></div>

                <select name="category" class="form-select border-0 w-auto flex-shrink-0 search-btn"
                        aria-label="Categorie">
                    <x-navbar.category-options :categories="$categories"/>
                </select>

                <div class="vr mx-2"></div>

                <div class="d-flex align-items-center px-2 flex-shrink-0">
                    <i class="fa-solid fa-location-dot me-2"></i>
                    <input type="text" name="city" value="{{ old('city') }}"
                           class="form-control border-0 w-auto" placeholder="Tutta Italia">
                </div>

                <button class="btn btn-primary ms-2 px-4 rounded-5 flex-shrink-0 search-btn" type="submit">Cerca
                </button>

            </form>
        </div>

        {{-- Mobile --}}
        <div class="d-lg-none">
            <div class="container pt-2 pb-3">
                <form method="GET" action="#" class="d-flex flex-column gap-2">

                    {{-- ricerca --}}
                    <div class="search-pill d-flex align-items-center border rounded-5 px-3 py-2">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                        <input type="text" name="q" value="{{ old('q') }}"
                               class="form-control border-0 bg-transparent p-0" placeholder="Cosa stai cercando?">
                        {{-- cerca --}}
                        <button class="btn btn-primary rounded-5 px-4 align-self-end search-btn" type="submit">Cerca
                        </button>
                    </div>

                    {{-- categoria e città --}}
                    <div class="d-flex gap-2">
                        <div class="search-pill d-flex align-items-center flex-fill border rounded-5 px-3 py-2">
                            <i class="fa-solid fa-list-ul me-2"></i>
                            <select name="category" class="form-select border-0 bg-transparent p-0"
                                    aria-label="Categorie">
                                <x-navbar.category-options :categories="$categories"/>
                            </select>
                        </div>

                        <div class="search-pill d-flex align-items-center flex-fill border rounded-5 px-3 py-2">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <input type="text" name="city" value="{{ old('city') }}"
                                   class="form-control border-0 bg-transparent p-0" placeholder="Tutta Italia">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endif
