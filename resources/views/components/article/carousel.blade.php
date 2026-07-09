@if($article->images->count())

    <div id="carouselExampleIndicators" class="carousel slide hero-carousel " data-bs-ride="carousel">

        @if($article->images->count() > 1)
            <div class="carousel-indicators">
                @foreach($article->images as $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $loop->index }}"
                            @if($loop->first) class="active" @endif>

                    </button>
                @endforeach
            </div>
        @endif


        <div class="carousel-inner rounded-4 overflow-hidden">
            @foreach($article->images as $key => $image)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{ $image->getUrl(400, 300) }}" class="d-block hero-carousel-img"
                         alt="Immagine {{$key + 1}} dell'articolo {{$article->title}}">
                </div>

            @endforeach
        </div>


        @if($article->images->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        @endif
    </div>
@else
    <div class="w-100 h-100 rounded-4 bg-body-secondary d-flex align-items-center justify-content-center p-5">
        <i class="fa-solid fa-thumbtack-slash fs-5"></i>
    </div>
@endif
