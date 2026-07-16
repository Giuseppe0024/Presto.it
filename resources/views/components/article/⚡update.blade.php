<?php

use App\Jobs\GoogleVisionLabelImage;
use App\Models\Article;
use App\Models\Image;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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

        /*
        Se c'è già una revisione in attesa il form riparte da quella, altrimenti
        l'utente non vedrebbe le proprie modifiche e le annullerebbe risalvando.
        */
        $source = $article->revision ?? $article;

        $this->article = $article;
        $this->title = $source->title;
        $this->description = $source->description;
        $this->city = $source->city;
        $this->price = $source->price;
        $this->category = (string) $source->category_id;
        $this->delivery_shipping = (bool) $source->delivery_shipping;
        $this->images_to_delete = $article->revision?->images_to_delete ?? [];
    }

    #[Computed]
    public function existingImages()
    {
        return $this->article->allImages()->whereNotIn('id', $this->images_to_delete)->get();
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
        if ($this->article->allImages()->where('id', $imageId)->exists()) {
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

        /*
        Un annuncio online non viene toccato: le modifiche diventano una revisione
        che resta invisibile al pubblico finché un revisore non la approva.
        */
        if ($this->article->is_accepted === true) {
            $this->submitRevision();

            redirect()->route('article.myArticles')->with('success', __('ui.revisionSubmitted'));

            return;
        }

        $this->updateArticle();

        redirect()->route('article.myArticles')->with('success', __('ui.updateSuccess'));
    }

    private function submitRevision(): void
    {
        $pendingToDelete = $this->article->allImages()
            ->whereIn('id', $this->images_to_delete)
            ->whereNotNull('revision_id')
            ->get();

        $liveToDelete = $this->article->images()
            ->whereIn('id', $this->images_to_delete)
            ->pluck('id')
            ->all();

        $revision = $this->article->revision()->updateOrCreate([], [
            'title' => $this->title,
            'city' => $this->city,
            'description' => $this->description,
            'price' => $this->price,
            'delivery_shipping' => $this->delivery_shipping,
            'category_id' => $this->category,
            'images_to_delete' => $liveToDelete,
            'token' => Str::random(40),
        ]);

        /* Le immagini pendenti scartate non sono mai state online: si eliminano subito. */
        foreach ($pendingToDelete as $image) {
            $image->deleteWithFiles();
        }

        $this->storeImages($revision->id);
    }

    private function updateArticle(): void
    {
        $this->article->update([
            'title' => $this->title,
            'city' => $this->city,
            'description' => $this->description,
            'price' => $this->price,
            'delivery_shipping' => $this->delivery_shipping,
            'category_id' => $this->category,
        ]);

        foreach ($this->article->images()->whereIn('id', $this->images_to_delete)->get() as $image) {
            $image->deleteWithFiles();
        }

        $this->storeImages(null);

        $this->article->setAccepted(null);
    }

    private function storeImages(?int $revisionId): void
    {
        if (count($this->images) === 0) {
            return;
        }

        foreach ($this->images as $image) {
            $newImage = new Image(['path' => $image->store("articles/{$this->article->id}", 'public')]);
            $newImage->article_id = $this->article->id;
            $newImage->revision_id = $revisionId;
            $newImage->save();

            GoogleVisionSafeSearch::withChain([
                new GoogleVisionLabelImage($newImage->id),
                new RemoveFaces($newImage->id),
                new ResizeImage($newImage->path, 400, 300),
            ])->dispatch($newImage->id);
        }

        File::deleteDirectory(storage_path('app/livewire-tmp'));
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
                        <option value="{{ $category->id }}">{{ __("ui.{$category->name}") }}</option>
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
