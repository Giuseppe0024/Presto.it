<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'delivery_pickup',
        'delivery_shipping',
    ];

    public static function toBeRevisedCount(): int
    {
        return Article::where('is_accepted', null)->count();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();

        return true;
    }

    // Quando aggiungiamo le città al modello bisogna aggiungere qui 'city' => $this->>city
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'is_accepted' => $this->is_accepted,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category_id,
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
            'delivery_pickup' => 'boolean',
            'delivery_shipping' => 'boolean',
        ];
    }
}
