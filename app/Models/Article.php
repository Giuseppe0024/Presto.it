<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'city',
        'description',
        'price',
        'category_id',
        'user_id',
        'delivery_shipping',
    ];

    public static function toBeRevisedCount(): int
    {
        $restricted = (bool) config('app.revisor_restrictions');
        $userId = auth()->id();

        $articles = static::whereNull('is_accepted')
            ->when($restricted, fn ($query) => $query->where('user_id', '!=', $userId))
            ->count();

        $revisions = ArticleRevision::when($restricted, fn ($query) => $query->whereHas(
            'article',
            fn ($article) => $article->where('user_id', '!=', $userId),
        ))->count();

        return $articles + $revisions;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class)->whereNull('revision_id');
    }

    public function allImages(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function revision(): HasOne
    {
        return $this->hasOne(ArticleRevision::class);
    }

    public function hasPendingRevision(): bool
    {
        return $this->revision !== null;
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();

        return true;
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'is_accepted' => $this->is_accepted,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category_id,
            'city' => $this->city,
            'created_at' => $this->created_at,
        ];
    }

    /*
    Onestamente ancora non capisco a pieno come funzionino i cast, ma di base servono
    per definire da quale e in quale tipo di dato gli attributi debbano essere trasformati.
    In questo caso ci stiamo assicurando che delivery_shipping e delivery_pickup vengano definiti sempre come booleani.
    */
    protected function casts(): array
    {
        return [
            'is_accepted' => 'boolean',
            'delivery_pickup' => 'boolean',
            'delivery_shipping' => 'boolean',
        ];
    }

    /*
    Aggiungere articoli tra i preferiti di un utente
    */
    public function favoritedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'article_user')
            ->withTimestamps();
    }
}
