<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class ArticleRevision extends Model
{
    protected $fillable = [
        'title',
        'city',
        'description',
        'price',
        'category_id',
        'delivery_shipping',
        'images_to_delete',
        'token',
    ];

    protected function casts(): array
    {
        return [
            'images_to_delete' => 'array',
            'delivery_shipping' => 'boolean',
        ];
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'revision_id');
    }

    public function proposedImages(): Collection
    {
        return $this->article->allImages()
            ->whereNotIn('id', $this->images_to_delete ?? [])
            ->get();
    }

    public function approve(): void
    {
        DB::transaction(function () {
            $article = $this->article;

            $article->update([
                'title' => $this->title,
                'city' => $this->city,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'delivery_shipping' => $this->delivery_shipping,
            ]);

            foreach ($article->images()->whereIn('id', $this->images_to_delete ?? [])->get() as $image) {
                $image->deleteWithFiles();
            }

            $this->images()->update(['revision_id' => null]);

            $this->delete();
        });
    }

    public function reject(): void
    {
        DB::transaction(function () {
            foreach ($this->images as $image) {
                $image->deleteWithFiles();
            }

            $this->delete();
        });
    }
}
