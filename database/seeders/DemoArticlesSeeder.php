<?php

namespace Database\Seeders;

use App\Jobs\ResizeImage;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Titolo articolo => nome file in resources/images/demo-articles.
     *
     * @var array<string, string>
     */
    protected array $productImages = [
        'Smartphone Android 128GB' => 'smartphone-android-128gb.webp',
        'Cuffie Bluetooth over-ear' => 'cuffie-bluetooth-over-ear.webp',
        'Smart TV 50" 4K' => 'smart-tv-50-4k.webp',
        'Tablet 10" Wi-Fi' => 'tablet-10-wifi.webp',
        'Giacca in pelle vintage' => 'giacca-in-pelle-vintage.webp',
        'Sneakers da running' => 'sneakers-da-running.webp',
        'Cappotto invernale in lana' => 'cappotto-invernale-in-lana.webp',
        'Felpa con cappuccio oversize' => 'felpa-con-cappuccio-oversize.webp',
        'Phon professionale ionico' => 'phon-professionale-ionico.webp',
        'Set pennelli make-up' => 'set-pennelli-make-up.webp',
        'Profumo eau de parfum 100ml' => 'profumo-eau-de-parfum-100ml.webp',
        'Piastra per capelli in ceramica' => 'piastra-per-capelli-in-ceramica.webp',
        'Set di pentole antiaderenti' => 'set-di-pentole-antiaderenti.webp',
        'Tagliaerba elettrico' => 'tagliaerba-elettrico.webp',
        'Lampada da tavolo di design' => 'lampada-da-tavolo-di-design.webp',
        'Robot aspirapolvere' => 'robot-aspirapolvere.webp',
        'Set costruzioni 500 pezzi' => 'set-costruzioni-500-pezzi.webp',
        'Macchinina telecomandata' => 'macchinina-telecomandata.webp',
        'Puzzle 1000 pezzi' => 'puzzle-1000-pezzi.webp',
        'Peluche gigante' => 'peluche-gigante.webp',
        'Mountain bike 27.5"' => 'mountain-bike-27-5.webp',
        'Tapis roulant pieghevole' => 'tapis-roulant-pieghevole.webp',
        'Set manubri 20kg' => 'set-manubri-20kg.webp',
        'Racchetta da tennis pro' => 'racchetta-da-tennis-pro.webp',
        'Tiragraffi per gatti' => 'tiragraffi-per-gatti.webp',
        'Cuccia per cani taglia media' => 'cuccia-per-cani-taglia-media.webp',
        'Acquario 60L completo' => 'acquario-60l-completo.webp',
        'Trasportino da viaggio' => 'trasportino-da-viaggio.webp',
        'Romanzo bestseller cartonato' => 'romanzo-bestseller-cartonato.webp',
        'Manuale di fotografia' => 'manuale-di-fotografia.webp',
        'Collezione fumetti vintage' => 'collezione-fumetti-vintage.webp',
        'Atlante geografico illustrato' => 'atlante-geografico-illustrato.webp',
        'Orologio analogico in acciaio' => 'orologio-analogico-in-acciaio.webp',
        'Zaino impermeabile 30L' => 'zaino-impermeabile-30l.webp',
        'Occhiali da sole polarizzati' => 'occhiali-da-sole-polarizzati.webp',
        'Portafoglio in vera pelle' => 'portafoglio-in-vera-pelle.webp',
        'Casco integrale omologato' => 'casco-integrale-omologato.webp',
        'Set pneumatici estivi' => 'set-pneumatici-estivi.webp',
        'Navigatore satellitare' => 'navigatore-satellitare.webp',
        'Seggiolino auto per bambini' => 'seggiolino-auto-per-bambini.webp',
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

        $oldArticleIds = Article::where('user_id', $user->id)->pluck('id');
        foreach ($oldArticleIds as $oldArticleId) {
            Storage::disk('public')->deleteDirectory("articles/{$oldArticleId}");
        }
        Article::where('user_id', $user->id)->delete();

        foreach ($categories as $category) {
            $titles = $this->samples[$category->name] ?? [
                "{$category->name} - articolo di esempio",
            ];
            [$min, $max] = $this->priceRanges[$category->name] ?? [5, 150];

            for ($i = 0; $i < $this->perCategory; $i++) {
                $title = $titles[$i] ?? ($titles[$i % count($titles)].' #'.($i + 1));

                $article = Article::create([
                    'title' => $title,
                    'city' => fake()->randomElement($this->cities),
                    'description' => "{$title}. Ottime condizioni, usato pochissimo. Vendo per fare spazio. Disponibile a rispondere a domande e a inviare altre foto.",
                    'price' => fake()->numberBetween($min, $max) + 0.99,
                    'category_id' => $category->id,
                    'user_id' => $user->id,
                    'delivery_pickup' => true,
                    'delivery_shipping' => fake()->boolean(60),
                ]);

                // in base al count vengono attaccate 1 o > 1 immagini per poter testare il funzionamento del carosello.
                $this->attachImages($article, $title, ($i % 3) + 1);
            }
        }

        $this->command?->info("Creati {$this->perCategory} articoli per ognuna delle {$categories->count()} categorie.");
    }

    protected function attachImages(Article $article, string $title, int $count): void
    {
        $filename = $this->productImages[$title] ?? null;

        if (! $filename) {
            return;
        }

        $sourcePath = resource_path("images/demo-articles/{$filename}");

        if (! file_exists($sourcePath)) {
            return;
        }

        for ($n = 1; $n <= $count; $n++) {
            $storagePath = "articles/{$article->id}/{$n}-{$filename}";

            Storage::disk('public')->put($storagePath, file_get_contents($sourcePath));

            $image = $article->images()->create(['path' => $storagePath]);

            ResizeImage::dispatchSync($image->path, 400, 300);
        }
    }
}
