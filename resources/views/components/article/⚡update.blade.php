<?php

use App\Jobs\GoogleVisionLabelImage;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;

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

    #[Validate('nullable|array|max:6')]
    public array $images = [];

    #[Validate('nullable|array')]
    public array $temporary_images = [];

    public array $images_to_delete = [];

    public Article $article;

    public function mount(Article $article): void
    {
        abort_if($article->user_id !== Auth::id(), 403);

        $this->article = $article;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->city = $article->city;
        $this->price = $article->price;
        $this->category = (string) $article->category_id;
        $this->delivery_shipping = (bool) $article->delivery_shipping;
    }

    #[Computed]
    public function existingImages()
    {
        return $this->article->images()->whereNotIn('id', $this->images_to_delete)->get();
    }

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

    public function removeExistingImage($imageId): void
    {
        if ($this->article->images()->where('id', $imageId)->exists()) {
            $this->images_to_delete[] = $imageId;
        }
    }

    public function update(): void
    {
        $this->validate();

        $totalImages = $this->existingImages->count() + count($this->images);

        if ($totalImages < 1) {
            $this->addError('images', __('ui.formImagesRequired'));
            return;
        }

        if ($totalImages > 6) {
            $this->addError('images', __('ui.formImagesMax'));
            return;
        }

        $this->article->update([
            'title' => $this->title,
            'city' => $this->city,
            'description' => $this->description,
            'price' => $this->price,
            'delivery_shipping' => $this->delivery_shipping,
            'category_id' => $this->category,
        ]);

        foreach ($this->article->images()->whereIn('id', $this->images_to_delete)->get() as $image) {
            Storage::disk('public')->delete($image->path);
            Storage::disk('public')->delete(dirname($image->path) . '/crop_400x300_' . basename($image->path));
            $image->delete();
        }

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public'),]);

                GoogleVisionSafeSearch::withChain([
                    new GoogleVisionLabelImage($newImage->id),
                    new RemoveFaces($newImage->id),
                    new ResizeImage($newImage->path, 400, 300),
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        $this->article->setAccepted(null);

        redirect()->route('article.myArticles')->with('success', __('ui.updateSuccess'));
    }
};

?>

<div class="container my-5 p-4 p-md-5 card-login rounded-5">


    <div>

        <h1 class="mb-4 text-secondary">{{ __('ui.updateTitle') }}</h1>
        <form class="row g-5 @if(!session()->has('success')) mb-5 @endif" wire:submit="update">


            <!-- COLONNA SINISTRA -->
            <div class="col-12 col-md-6">

                <!-- titolo -->

                <label for="title" class="form-label">{{ __('ui.formTitle') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                       placeholder="{{ __('ui.formTitlePlaceholder') }}"
                       wire:model.blur="title">
                <x-ui.input-error field="title"/>


                <!-- categoria -->

                <label for="category" class="form-label mt-3">{{ __('ui.formCategory') }}</label>
                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category"
                        wire:model.blur="category">
                    <option value="" disabled>{{ __('ui.formCategoryPlaceholder') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-ui.input-error field="category"/>


                <!-- descrizione -->


                <label for="description" class="form-label mt-3">{{ __('ui.formDescription') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                          name="description" rows="5"
                          placeholder="{{ __('ui.formDescriptionPlaceholder') }}"
                          wire:model.blur="description"></textarea>
                <x-ui.input-error field="description"/>


                <label for="price" class="form-label mt-3">{{ __('ui.formPrice') }}</label>
                <input type="number" min="0" step="any" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price"
                       placeholder="{{ __('ui.formPricePlaceholder') }}"
                       wire:model.blur="price">
                <x-ui.input-error field="price"/>

                <label for="city" class="form-label mt-3">{{ __('ui.formCity') }}</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                       placeholder="{{ __('ui.formCityPlaceholder') }}"
                       wire:model.blur="city">
                <x-ui.input-error field="city"/>


                <div class="mt-4">
                    <input type="checkbox" class="form-check-input"
                           id="delivery_shipping" name="delivery_shipping"
                           wire:model.blur="delivery_shipping">
                    <label for="delivery_shipping" class="ms-1 form-label">{{ __('ui.formShipping') }}</label>
                </div>
            </div>

            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <label class="form-label">{{ __('ui.formImagesLabel') }}</label>

                <div class="image-uploader w-100">
                    <div class="image-drop-box position-relative rounded-3 p-3 @error('images') is-invalid @enderror">
                        <label class="image-drop-area position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center">
                            <input type="file" wire:model="temporary_images" multiple accept="image/*"
                                   class="image-drop-input position-absolute top-0 start-0 w-100 h-100 opacity-0">
                            @if (!count($images) && !$this->existingImages->count())
                                <i class="fa-regular fa-images upload-icon"></i>
                                <span class="d-block mt-3">{{ __('ui.uploadDrag') }}</span>
                                <span class="d-block mt-1 small opacity-75">{{ __('ui.uploadMaxSize') }}</span>
                            @endif
                        </label>

                        @if (count($images) || $this->existingImages->count())
                            <div class="d-flex flex-wrap gap-2 position-relative pe-none">
                                @foreach ($this->existingImages as $image)
                                    <div class="image-preview position-relative" wire:key="existing-img-{{ $image->id }}">
                                        <img src="{{ $image->getUrl(400, 300) }}" alt=""
                                             class="w-100 h-100 object-fit-cover rounded-3">
                                        <button type="button"
                                                class="image-preview-remove btn btn-danger rounded-circle p-0 d-flex align-items-center justify-content-center position-absolute top-0 end-0 m-1 shadow-sm pe-auto"
                                                wire:click="removeExistingImage({{ $image->id }})">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                @endforeach
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

                <x-ui.input-error field="temporary_images.*"/>
                <x-ui.input-error field="images"/>


                <button type="submit" class="btn btn-primary mt-3">{{ __('ui.formUpdate') }}</button>
            </div>
        </form>
        <x-ui.alerts/>
    </div>
</div>
