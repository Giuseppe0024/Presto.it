<x-layouts.app>

    <div class="container my-5">

        <div class="row g-5 align-items-stretch">

            {{-- Card principale --}}
            <div class="col-12 col-md-8 d-flex">

                <div class="p-4 p-md-5 card-login rounded-5 w-100 h-100">

                    <div class="row g-5 mt-1">

                        <div
                                class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start align-items-md-center"
                        >
                            <x-article.carousel :article="$article"/>
                        </div>

                        <div class="col-12 col-md-6">
                            <x-article.details :article="$article"/>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Card laterale --}}
            <div class="col-12 col-md-4 d-flex">
                <x-article.aside :article="$article"/>
            </div>

        </div>

    </div>

</x-layouts.app>