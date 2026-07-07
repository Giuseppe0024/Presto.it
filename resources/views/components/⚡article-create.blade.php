<?php

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

new class extends Component {

    use WithFileUploads;

    #[Validate('required|min:5')]
    public string $title;

    #[Validate('required|min:10')]
    public string $description;

    #[Validate('required|min:2')]
    public string $city;

    #[Validate('required|numeric')]
    public $price;

    #[Validate('required')]
    public string $category = '';

    public bool $delivery_shipping = false;

    #[Validate('required|array|min:1|max:6')]
    public array $images = [];

    #[Validate('nullable|array')]
    public array $temporary_images = [];

    public Article $article;

    public function updatedTemporaryImages(): void
    {
        $this->validate([
            'temporary_images.*' => 'image|max:2048',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }

        $this->temporary_images = [];
    }

    public function removeImage($index): void
    {
        if (in_array($index, array_keys($this->images))) {
            unset($this->images[$index]);
        }
    }

    public function store(): void
    {
        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'city' => $this->city,
            'description' => $this->description,
            'price' => $this->price,
            'delivery_shipping' => $this->delivery_shipping,
            'category_id' => $this->category,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($this->images as $image) {
            $this->article->images()->create([
                'path' => $image->store('articles', 'public'),
            ]);
        }

        $this->reset();
        session()->flash('success', __('ui.formSuccess'));
        $this->dispatch('article-created');
    }
};
?>

<div class="container my-5 p-4 p-md-5 card-login rounded-5 text-secondary">


    <div>

        <h1 class="mb-4">{{ __('ui.createTitle') }}</h1>
        <form class="row g-5 @if(!session()->has('success')) mb-5 @endif" wire:submit="store">


            <!-- COLONNA SINISTRA -->
            <div class="col-12 col-md-6">

                <!-- titolo -->

                <label for="title" class="form-label">{{ __('ui.formTitle') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                       placeholder="{{ __('ui.formTitlePlaceholder') }}"
                       wire:model.blur="title">
                <x-input-error field="title"/>


                <!-- categoria -->

                <label for="category" class="form-label mt-3">{{ __('ui.formCategory') }}</label>
                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category"
                        wire:model.blur="category">
                    <option value="" selected disabled>{{ __('ui.formCategoryPlaceholder') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error field="category"/>


                <!-- descrizione -->


                <label for="description" class="form-label mt-3">{{ __('ui.formDescription') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                          name="description" rows="5"
                          placeholder="{{ __('ui.formDescriptionPlaceholder') }}"
                          wire:model.blur="description"></textarea>
                <x-input-error field="description"/>


                <label for="price" class="form-label mt-3">{{ __('ui.formPrice') }}</label>
                <input type="number" min="0" step="any" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price"
                       placeholder="{{ __('ui.formPricePlaceholder') }}"
                       wire:model.blur="price">
                <x-input-error field="price"/>

                <label for="city" class="form-label mt-3">{{ __('ui.formCity') }}</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                       placeholder="{{ __('ui.formCityPlaceholder') }}"
                       wire:model.blur="city">
                <x-input-error field="city"/>


                <div class="mt-4">
                    <input type="checkbox" class="form-check-input"
                           id="delivery_shipping" name="delivery_shipping"
                           wire:model.blur="delivery_shipping">
                    <label for="delivery_shipping" class="ms-1 form-label">{{ __('ui.formShipping') }}</label>
                </div>

                {{--  bisogna fare una migrazione prima di implementare questa funzionalità  --}}
                {{--<label for="condition" class="form-label mt-3 ">Condizioni</label>
                    <select class="form-select" id="condition" name="condition">
                        <option selected disabled>In quale condizione è il prodotto?</option>
                        <option>Nuovo con cartellino</option>
                        <option>Nuovo</option>
                        <option>Ottime</option>
                        <option>Buone</option>
                        <option>Accettabili</option>
                    </select>--}}
            </div>

            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <label class="form-label">{{ __('ui.formImagesLabel') }}</label>

                <div class="image-uploader w-100">
                    <div class="image-drop-box position-relative rounded-3 p-3 @error('images') is-invalid @enderror">
                        <label class="image-drop-area position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center">
                            <input type="file" wire:model="temporary_images" multiple accept="image/*"
                                   class="image-drop-input position-absolute top-0 start-0 w-100 h-100 opacity-0">
                            @if (!count($images))
                                <i class="fa-regular fa-images upload-icon"></i>
                                <span class="d-block mt-3">{{ __('ui.uploadDrag') }}</span>
                                <span class="d-block mt-1 small opacity-75">{{ __('ui.uploadMaxSize') }}</span>
                            @endif
                        </label>

                        @if (count($images))
                            <div class="d-flex flex-wrap gap-2 position-relative pe-none">
                                @foreach ($images as $key => $image)
                                    <div class="image-preview position-relative" wire:key="img-{{ $key }}">
                                        <img src="{{ $image->temporaryUrl() }}" alt=""
                                             class="w-100 h-100 object-fit-cover rounded-3">
                                        <button type="button"
                                                class="image-preview-remove btn btn-danger rounded-circle p-0 d-flex align-items-center justify-content-center position-absolute top-0 end-0 m-1 shadow-sm pe-auto"
                                                wire:click="removeImage({{ $key }})">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div wire:loading wire:target="temporary_images" class="small mt-2">{{ __('ui.formUploading') }}</div>

                <x-input-error field="temporary_images.*"/>
                <x-input-error field="images"/>


                <button type="submit" class="btn btn-primary mt-3">{{ __('ui.formPublish') }}</button>
            </div>
        </form>
        <x-alerts/>
    </div>
</div>
