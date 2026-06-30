<?php

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

new class extends Component {

    #[Validate('required|min:5')]
    public string $title;

    #[Validate('required|min:10')]
    public string $description;

    #[Validate('required|numeric')]
    public $price;

    #[Validate('required')]
    public string $category;

    public bool $delivery_shipping;

    public Article $article;

    public function store(): void
    {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'delivery_shipping' => $this->delivery_shipping,
            'category_id' => $this->category,
            'user_id' => Auth::user()->id
        ]);
        $this->reset();
        session()->flash('success', 'Annuncio creato correttamente');
    }

};
?>

<div class="container my-5 p-4 p-md-5 card-login rounded-5 stonegreen-color">


    <div>
        <h1 class="mb-4">Crea il tuo annuncio</h1>

        <form class="row g-5 @if(!session()->has('success')) mb-5 @endif" wire:submit="store">


            <!-- COLONNA SINISTRA -->
            <div class="col-12 col-md-6">

                <!-- titolo -->

                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                       placeholder="Inserisci il titolo"
                       wire:model.blur="title">
                @error('title')
                <p class="small text-danger">{{ $message }}</p>
                @enderror

                <!-- categoria -->

                {{--                non funziona il selected su seleziona categoria !!!--}}
                <label for="category" class="form-label mt-3">Categoria</label>
                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category"
                        wire:model.blur="category">
                    <option selected disabled>Seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="small text-danger">{{ $message }}</p>
                @enderror


                <!-- descrizione -->

                <label for="description" class="form-label mt-3">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                          name="description" rows="5"
                          placeholder="Inserisci la descrizione" wire:model.blur="description"></textarea>
                @error('description')
                <p class="small text-danger">{{ $message }}</p>
                @enderror

                <label for="price" class="form-label mt-3">Prezzo</label>
                <input type="number" min="0" step="any" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price"
                       placeholder="Inserisci il prezzo"
                       wire:model.blur="price">
                @error('price')
                <p class="small text-danger">{{ $message }}</p>
                @enderror


                <div class="mt-4">
                    <input type="checkbox" class="form-check-input"
                           id="delivery_shipping" name="delivery_shipping"
                           wire:model.blur="delivery_shipping">
                    <label for="price" class="ms-1 form-label">Disponibile per la spedizione</label>
                </div>

                {{--            bisogna fare una migrazione prima di implementare questa funzionalità--}}
                {{--            <label for="condition" class="form-label mt-3 ">Condizioni</label>
                            <select class="form-select" id="condition" name="condition">
                                <option selected disabled>In quale condizione è il prodotto?</option>
                                <option>Nuovo con cartellino</option>
                                <option>Nuovo</option>
                                <option>Ottime</option>
                                <option>Buone</option>
                                <option>Accettabili</option>
                            </select>--}}
            </div>

            <!-- COLONNA DESTRA -->

            <!-- bisogna aggiungere pulsante DENTRO il div per caricare le immagini, devo capire come si fa e bisogna bloccare il div sennò si ingrandisce, PROBABILMENTE CON DROPZONE JS -->

            <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <label for="image" class="form-label">Carica le immagini del tuo articolo</label>

                <div class="image-input-box d-flex align-items-center justify-content-center">
                    <i class="fa-regular fa-images upload-icon"></i>
                </div>


                <button type="submit" class="btn btn-orange mt-3">Pubblica</button>
            </div>
        </form>
        <x-success/>
    </div>
</div>