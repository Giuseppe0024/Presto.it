<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoArticlesSeeder extends Seeder
{
    protected int $perCategory = 4;

    protected array $samples = [
        'Elettronica' => [
            'Smartphone Android 128GB',
            'Cuffie Bluetooth over-ear',
            'Smart TV 50" 4K',
            'Tablet 10" Wi-Fi',
            'Console portatile',
        ],
        'Abbigliamento' => [
            'Giacca in pelle vintage',
            'Sneakers da running',
            'Cappotto invernale in lana',
            'Felpa con cappuccio oversize',
            'Jeans slim fit',
        ],
        'Salute e Bellezza' => [
            'Phon professionale ionico',
            'Set pennelli make-up',
            'Profumo eau de parfum 100ml',
            'Piastra per capelli in ceramica',
            'Epilatore a luce pulsata',
        ],
        'Casa e Giardino' => [
            'Set di pentole antiaderenti',
            'Tagliaerba elettrico',
            'Lampada da tavolo di design',
            'Robot aspirapolvere',
            'Set tavolo e sedie da giardino',
        ],
        'Giocattoli' => [
            'Set costruzioni 500 pezzi',
            'Macchinina telecomandata',
            'Puzzle 1000 pezzi',
            'Peluche gigante',
            'Gioco da tavolo per famiglie',
        ],
        'Sport' => [
            'Mountain bike 27.5"',
            'Tapis roulant pieghevole',
            'Set manubri 20kg',
            'Racchetta da tennis pro',
            'Tenda da campeggio 3 posti',
        ],
        'Animali Domestici' => [
            'Tiragraffi per gatti',
            'Cuccia per cani taglia media',
            'Acquario 60L completo',
            'Trasportino da viaggio',
            'Set ciotole in acciaio',
        ],
        'Libri e Riviste' => [
            'Romanzo bestseller cartonato',
            'Manuale di fotografia',
            'Collezione fumetti vintage',
            'Atlante geografico illustrato',
            'Raccolta riviste di cucina',
        ],
        'Accessori' => [
            'Orologio analogico in acciaio',
            'Zaino impermeabile 30L',
            'Occhiali da sole polarizzati',
            'Portafoglio in vera pelle',
            'Cintura artigianale',
        ],
        'Motori' => [
            'Casco integrale omologato',
            'Set pneumatici estivi',
            'Navigatore satellitare',
            'Seggiolino auto per bambini',
            'Box tetto portabagagli',
        ],
    ];

    protected array $cities = [
        'Roma',
        'Milano',
        'Napoli',
        'Torino',
        'Palermo',
        'Genova',
        'Bologna',
        'Firenze',
        'Bari',
        'Catania',
        'Venezia',
        'Verona',
    ];

    /**
     * Fascia di prezzo [min, max] in euro per categoria.
     *
     * @var array<string, array{0: int, 1: int}>
     */
    protected array $priceRanges = [
        'Elettronica' => [20, 400],
        'Abbigliamento' => [5, 120],
        'Salute e Bellezza' => [5, 90],
        'Casa e Giardino' => [10, 250],
        'Giocattoli' => [5, 80],
        'Sport' => [10, 300],
        'Animali Domestici' => [5, 120],
        'Libri e Riviste' => [3, 40],
        'Accessori' => [5, 150],
        'Motori' => [20, 500],
    ];

    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command?->warn('Nessuna categoria presente: esegui prima le migrazioni/CategoriesSeeder.');

            return;
        }

        $user = User::firstOrCreate(
            ['email' => 'demo@presto.it'],
            ['name' => 'Demo Venditore', 'password' => bcrypt('password')],
        );

        Article::where('user_id', $user->id)->delete();

        foreach ($categories as $category) {
            $titles = $this->samples[$category->name] ?? [
                "{$category->name} - articolo di esempio",
            ];
            [$min, $max] = $this->priceRanges[$category->name] ?? [5, 150];

            for ($i = 0; $i < $this->perCategory; $i++) {
                $title = $titles[$i] ?? ($titles[$i % count($titles)].' #'.($i + 1));

                Article::create([
                    'title' => $title,
                    'city' => fake()->randomElement($this->cities),
                    'description' => "{$title}. Ottime condizioni, usato pochissimo. Vendo per fare spazio. Disponibile a rispondere a domande e a inviare altre foto.",
                    'price' => fake()->numberBetween($min, $max) + 0.99,
                    'category_id' => $category->id,
                    'user_id' => $user->id,
                    'delivery_pickup' => true,
                    'delivery_shipping' => fake()->boolean(60),
                ]);
            }
        }

        $this->command?->info("Creati {$this->perCategory} articoli per ognuna delle {$categories->count()} categorie.");
    }
}
