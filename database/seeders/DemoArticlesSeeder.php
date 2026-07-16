<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DemoArticlesSeeder extends Seeder
{
    protected const OK = 'text-secondary fa-solid fa-circle-check';

    protected const WARN = 'text-warning fa-solid fa-circle-exclamation';

    protected const DANGER = 'text-danger fa-solid fa-circle-minus';

    protected array $articles = [
        [
            'title' => 'Smartphone Android 128GB',
            'category' => 'Elettronica',
            'city' => 'Roma',
            'price' => 249.99,
            'shipping' => true,
            'file' => 'smartphone-android-128gb.webp',
            'copies' => 1,
            'labels' => ['Gadget', 'Electronic device', 'Communication Device', 'Portable communications device', 'Mobile device', 'Mobile phone', 'Telephony', 'Display device', 'Multimedia', 'Telephone'],
        ],
        [
            'title' => 'Cuffie Bluetooth over-ear',
            'category' => 'Elettronica',
            'city' => 'Milano',
            'price' => 89.99,
            'shipping' => true,
            'file' => 'cuffie-bluetooth-over-ear.webp',
            'copies' => 2,
            'labels' => ['Audio equipment', 'Electronic device', 'Gadget', 'Headphones', 'Peripheral', 'Technology', 'Electrical cable', 'Headset', 'Communication Device', 'Electronics'],
        ],
        [
            'title' => 'Smart TV 50" 4K',
            'category' => 'Elettronica',
            'city' => 'Napoli',
            'price' => 379.99,
            'shipping' => false,
            'file' => 'smart-tv-50-4k.webp',
            'copies' => 3,
            'labels' => ['Electronic device', 'Display device', 'Output device', 'Peripheral', 'Computer monitor', 'Flat-panel display', 'Technology', 'Electronics', 'Television set', 'LED-backlit LCD'],
        ],
        [
            'title' => 'Tablet 10" Wi-Fi',
            'category' => 'Elettronica',
            'city' => 'Torino',
            'price' => 199.99,
            'shipping' => true,
            'file' => 'tablet-10-wifi.webp',
            'copies' => 1,
            'labels' => ['Electronic device', 'Gadget', 'Display device', 'Tablet computer', 'Electronics', 'Technology', 'Communication Device', 'Mobile device', 'Operating system', 'Portable communications device'],
        ],
        [
            'title' => 'Giacca in pelle vintage',
            'category' => 'Abbigliamento',
            'city' => 'Palermo',
            'price' => 89.99,
            'shipping' => true,
            'file' => 'giacca-in-pelle-vintage.webp',
            'copies' => 1,
            'labels' => ['Shoe', 'Fashion', 'Thigh', 'Knee-high boot', 'Knee', 'Waist', 'High-heeled shoe', 'Boot', 'Riding boot', 'Leather'],
            'racy' => self::WARN,
        ],
        [
            'title' => 'Sneakers da running',
            'category' => 'Abbigliamento',
            'city' => 'Genova',
            'price' => 59.99,
            'shipping' => true,
            'file' => 'sneakers-da-running.webp',
            'copies' => 2,
            'labels' => ['Footwear', 'Shoe', 'White', 'Black', 'Sportswear', 'Sneakers', 'Pink', 'Purple', 'Walking Shoe', 'Grey'],
        ],
        [
            'title' => 'Cappotto invernale in lana',
            'category' => 'Abbigliamento',
            'city' => 'Bologna',
            'price' => 110.99,
            'shipping' => true,
            'file' => 'cappotto-invernale-in-lana.webp',
            'copies' => 3,
            'labels' => ['Collar', 'Overcoat', 'Button', 'Woolen', 'Wool', 'Natural material', 'Cardigan', 'One-piece garment', 'Vintage clothing', 'Duster'],
        ],
        [
            'title' => 'Felpa con cappuccio oversize',
            'category' => 'Abbigliamento',
            'city' => 'Firenze',
            'price' => 34.99,
            'shipping' => true,
            'file' => 'felpa-con-cappuccio-oversize.webp',
            'copies' => 1,
            'labels' => ['Sleeve', 'Shoulder', 'Neck', 'Fashion', 'Orange', 'Sportswear', 'Waist', 'Abdomen', 'Muscle', 'Fashion Model'],
            'racy' => self::DANGER,
        ],
        [
            'title' => 'Phon professionale ionico',
            'category' => 'Salute e Bellezza',
            'city' => 'Bari',
            'price' => 49.99,
            'shipping' => true,
            'file' => 'phon-professionale-ionico.webp',
            'copies' => 1,
            'labels' => ['Toy', 'Snout', 'Machine', 'Plastic'],
            'spoof' => self::WARN,
        ],
        [
            'title' => 'Set pennelli make-up',
            'category' => 'Salute e Bellezza',
            'city' => 'Catania',
            'price' => 24.99,
            'shipping' => true,
            'file' => 'set-pennelli-make-up.webp',
            'copies' => 2,
            'labels' => ['Pink', 'Brush', 'Personal care', 'Makeup brushes', 'Cosmetics'],
        ],
        [
            'title' => 'Profumo eau de parfum 100ml',
            'category' => 'Salute e Bellezza',
            'city' => 'Venezia',
            'price' => 79.99,
            'shipping' => true,
            'file' => 'profumo-eau-de-parfum-100ml.webp',
            'copies' => 3,
            'labels' => ['Blue', 'Liquid', 'Bottle', 'Perfume', 'Personal care', 'Glass bottle', 'Solution', 'Cosmetics'],
        ],
        [
            'title' => 'Piastra per capelli in ceramica',
            'category' => 'Salute e Bellezza',
            'city' => 'Verona',
            'price' => 39.99,
            'shipping' => true,
            'file' => 'piastra-per-capelli-in-ceramica.webp',
            'copies' => 1,
            'labels' => ['Hair iron', 'Personal care', 'Hair care'],
        ],
        [
            'title' => 'Set di pentole antiaderenti',
            'category' => 'Casa e Giardino',
            'city' => 'Roma',
            'price' => 79.99,
            'shipping' => true,
            'file' => 'set-di-pentole-antiaderenti.webp',
            'copies' => 1,
            'labels' => ['Pot rack', 'Kitchen', 'Cookware and bakeware', 'Kitchen utensil', 'Frying pan', 'Shelving', 'Shelf', 'Kitchen Appliance', 'Household hardware', 'Serveware'],
        ],
        [
            'title' => 'Tagliaerba elettrico',
            'category' => 'Casa e Giardino',
            'city' => 'Milano',
            'price' => 149.99,
            'shipping' => false,
            'file' => 'tagliaerba-elettrico.webp',
            'copies' => 2,
            'labels' => ['Mower', 'Lawn mower', 'Outdoor Power Equipment', 'Walk-Behind Mower', 'Lawn', 'Edger', 'Tool'],
        ],
        [
            'title' => 'Lampada da tavolo di design',
            'category' => 'Casa e Giardino',
            'city' => 'Napoli',
            'price' => 45.99,
            'shipping' => true,
            'file' => 'lampada-da-tavolo-di-design.webp',
            'copies' => 3,
            'labels' => ['Metal', 'Cylinder', 'Light fixture', 'Brass', 'Nickel', 'Still life photography', 'Copper', 'Bronze'],
        ],
        [
            'title' => 'Robot aspirapolvere',
            'category' => 'Casa e Giardino',
            'city' => 'Torino',
            'price' => 229.99,
            'shipping' => true,
            'file' => 'robot-aspirapolvere.webp',
            'copies' => 1,
            'labels' => ['Electronic device', 'Technology', 'Gadget', 'Electronics'],
        ],
        [
            'title' => 'Set costruzioni 500 pezzi',
            'category' => 'Giocattoli',
            'city' => 'Palermo',
            'price' => 39.99,
            'shipping' => true,
            'file' => 'set-costruzioni-500-pezzi.webp',
            'copies' => 1,
            'labels' => ['Red', 'Orange', 'Toy block', 'Building sets', 'Plastic', 'Design', 'Toy', 'Educational toy', 'Construction Set Toy'],
        ],
        [
            'title' => 'Macchinina telecomandata',
            'category' => 'Giocattoli',
            'city' => 'Genova',
            'price' => 29.99,
            'shipping' => true,
            'file' => 'macchinina-telecomandata.webp',
            'copies' => 2,
            'labels' => ['Automotive Tire', 'Car', 'Automotive Exterior', 'Automotive lighting', 'Toy', 'Automotive Wheel System', 'Play Vehicle', 'Model car', 'Bumper', 'Hood'],
        ],
        [
            'title' => 'Puzzle 1000 pezzi',
            'category' => 'Giocattoli',
            'city' => 'Bologna',
            'price' => 14.99,
            'shipping' => true,
            'file' => 'puzzle-1000-pezzi.webp',
            'copies' => 3,
            'labels' => ['Beach', 'Photographic paper', 'Picture frame', 'Canidae'],
        ],
        [
            'title' => 'Peluche gigante',
            'category' => 'Giocattoli',
            'city' => 'Firenze',
            'price' => 24.99,
            'shipping' => true,
            'file' => 'peluche-gigante.webp',
            'copies' => 1,
            'labels' => ['Teddy bear', 'Stuffed toy', 'Toy', 'Bear', 'Baby toys', 'Brown', 'Plush', 'Carnivores', 'Snout', 'Fur'],
            'racy' => self::WARN,
        ],
        [
            'title' => 'Mountain bike 27.5"',
            'category' => 'Sport',
            'city' => 'Bari',
            'price' => 289.99,
            'shipping' => false,
            'file' => 'mountain-bike-27-5.webp',
            'copies' => 1,
            'labels' => ['Bicycle', 'Bicycle tire', 'Bicycle frame', 'Land vehicle', 'Bicycle wheel', 'Wheel', 'Bicycle Wheel Rim', 'Bicycle handlebar', 'Tire', 'Bicycle chain'],
        ],
        [
            'title' => 'Tapis roulant pieghevole',
            'category' => 'Sport',
            'city' => 'Catania',
            'price' => 249.99,
            'shipping' => false,
            'file' => 'tapis-roulant-pieghevole.webp',
            'copies' => 2,
            'labels' => ['Flooring', 'Floor', 'Window covering', 'Interior design', 'Window treatment', 'Lighting', 'Furniture', 'Curtain', 'Room', 'Ceiling'],
        ],
        [
            'title' => 'Set manubri 20kg',
            'category' => 'Sport',
            'city' => 'Venezia',
            'price' => 59.99,
            'shipping' => false,
            'file' => 'set-manubri-20kg.webp',
            'copies' => 3,
            'labels' => ['Physical fitness', 'Muscle', 'Thorax', 'Abdomen', 'Exercise', 'Dumbbell', 'Exercise equipment', 'Torso', 'Professional fitness coach', 'Weights'],
            'racy' => self::WARN,
        ],
        [
            'title' => 'Racchetta da tennis pro',
            'category' => 'Sport',
            'city' => 'Verona',
            'price' => 79.99,
            'shipping' => true,
            'file' => 'racchetta-da-tennis-pro.webp',
            'copies' => 1,
            'labels' => ['Tennis Racket', 'Tennis player', 'Tennis', 'Tennis--Equipment and supplies', 'Tennis court', 'Racket', 'Racquet sport', 'Sports Uniform', 'Individual sport', 'Soft tennis'],
            'racy' => self::WARN,
        ],
        [
            'title' => 'Tiragraffi per gatti',
            'category' => 'Animali Domestici',
            'city' => 'Roma',
            'price' => 69.99,
            'shipping' => true,
            'file' => 'tiragraffi-per-gatti.webp',
            'copies' => 1,
            'labels' => ['Cat furniture', 'Cat tree', 'Pet Supply', 'Scratching post', 'Grey', 'Textile', 'Wood', 'Comfort', 'Room', 'Rectangle'],
        ],
        [
            'title' => 'Cuccia per cani taglia media',
            'category' => 'Animali Domestici',
            'city' => 'Milano',
            'price' => 44.99,
            'shipping' => true,
            'file' => 'cuccia-per-cani-taglia-media.webp',
            'copies' => 2,
            'labels' => ['Cushion', 'Yellow', 'Throw pillow', 'Textile', 'Furniture', 'Pillow', 'Linens', 'Living room', 'Couch', 'Daybed'],
        ],
        [
            'title' => 'Acquario 60L completo',
            'category' => 'Animali Domestici',
            'city' => 'Napoli',
            'price' => 99.99,
            'shipping' => false,
            'file' => 'acquario-60l-completo.webp',
            'copies' => 3,
            'labels' => ['Freshwater aquarium', 'Fish', 'Pet Supply', 'Aquarium Decor', 'Aquarium', 'Glass', 'Aquarium lighting', 'Fish Supply', 'Aquatic plant', 'Algae'],
        ],
        [
            'title' => 'Trasportino da viaggio',
            'category' => 'Animali Domestici',
            'city' => 'Torino',
            'price' => 34.99,
            'shipping' => true,
            'file' => 'trasportino-da-viaggio.webp',
            'copies' => 1,
            'labels' => ['Cat', 'Felinae', 'Felidae', 'Pet Supply', 'Whiskers'],
            'spoof' => self::WARN,
        ],
        [
            'title' => 'Romanzo bestseller cartonato',
            'category' => 'Libri e Riviste',
            'city' => 'Palermo',
            'price' => 12.99,
            'shipping' => true,
            'file' => 'romanzo-bestseller-cartonato.webp',
            'copies' => 1,
            'labels' => ['Red', 'Book', 'Publication', 'Book cover', 'Novel', 'Varnish', 'Collection', 'Wood stain', 'Library', 'Self-help book'],
        ],
        [
            'title' => 'Manuale di fotografia',
            'category' => 'Libri e Riviste',
            'city' => 'Genova',
            'price' => 24.99,
            'shipping' => true,
            'file' => 'manuale-di-fotografia.webp',
            'copies' => 2,
            'labels' => ['Book', 'Paper', 'Publication', 'Paper Product', 'Office supplies', 'Document'],
        ],
        [
            'title' => 'Collezione fumetti vintage',
            'category' => 'Libri e Riviste',
            'city' => 'Bologna',
            'price' => 34.99,
            'shipping' => true,
            'file' => 'collezione-fumetti-vintage.webp',
            'copies' => 3,
            'labels' => ['Publication', 'Book', 'Fictional character', 'Fiction', 'Book cover', 'Comics', 'Comic book', 'Poster', 'Animated cartoon', 'Magazine'],
        ],
        [
            'title' => 'Atlante geografico illustrato',
            'category' => 'Libri e Riviste',
            'city' => 'Firenze',
            'price' => 19.99,
            'shipping' => true,
            'file' => 'atlante-geografico-illustrato.webp',
            'copies' => 1,
            'labels' => ['Map', 'Atlas', 'Paper', 'Number', 'Paper Product'],
        ],
        [
            'title' => 'Orologio analogico in acciaio',
            'category' => 'Accessori',
            'city' => 'Bari',
            'price' => 129.99,
            'shipping' => true,
            'file' => 'orologio-analogico-in-acciaio.webp',
            'copies' => 1,
            'labels' => ['Watch', 'Analog watch', 'Clock', 'Fashion', 'Everyday carry', 'Strap', 'Number', 'Glass', 'Font', 'Silver'],
        ],
        [
            'title' => 'Zaino impermeabile 30L',
            'category' => 'Accessori',
            'city' => 'Catania',
            'price' => 49.99,
            'shipping' => true,
            'file' => 'zaino-impermeabile-30l.webp',
            'copies' => 2,
            'labels' => ['Bag', 'Baggage', 'Strap', 'Mesh', 'Backpack', 'Leather', 'Carbon fibers', 'Gadget'],
        ],
        [
            'title' => 'Occhiali da sole polarizzati',
            'category' => 'Accessori',
            'city' => 'Venezia',
            'price' => 89.99,
            'shipping' => true,
            'file' => 'occhiali-da-sole-polarizzati.webp',
            'copies' => 3,
            'labels' => ['Eyewear', 'Black', 'Sunglasses', 'Goggles', 'Silver', 'Shadow', 'Still life photography', 'Night'],
        ],
        [
            'title' => 'Portafoglio in vera pelle',
            'category' => 'Accessori',
            'city' => 'Verona',
            'price' => 39.99,
            'shipping' => true,
            'file' => 'portafoglio-in-vera-pelle.webp',
            'copies' => 1,
            'labels' => ['Silver', 'Leather', 'Carbon fibers', 'Still life photography', 'Wallet', 'Office supplies', 'Gadget'],
        ],
        [
            'title' => 'Casco integrale omologato',
            'category' => 'Motori',
            'city' => 'Roma',
            'price' => 189.99,
            'shipping' => true,
            'file' => 'casco-integrale-omologato.webp',
            'copies' => 1,
            'labels' => ['Helmet', 'Motorcycle helmet', 'Personal protective equipment', 'Headgear', 'Protective gear in sports', 'Visor', 'Carbon fibers'],
        ],
        [
            'title' => 'Set pneumatici estivi',
            'category' => 'Motori',
            'city' => 'Milano',
            'price' => 320.99,
            'shipping' => false,
            'file' => 'set-pneumatici-estivi.webp',
            'copies' => 2,
            'labels' => ['Automotive Tire', 'Synthetic rubber', 'Automotive Wheel System', 'Tread', 'Rolling', 'Tire Care', 'Automotive Care', 'Natural rubber', 'Formula One tyres', 'Sand'],
        ],
        [
            'title' => 'Navigatore satellitare',
            'category' => 'Motori',
            'city' => 'Napoli',
            'price' => 99.99,
            'shipping' => true,
            'file' => 'navigatore-satellitare.webp',
            'copies' => 3,
            'labels' => ['Electronic device', 'Gadget', 'Display device', 'Mobile phone', 'Portable communications device', 'Communication Device', 'Mobile device', 'Telephony', 'Electronics', 'Smartphone'],
        ],
        [
            'title' => 'Seggiolino auto per bambini',
            'category' => 'Motori',
            'city' => 'Torino',
            'price' => 129.99,
            'shipping' => true,
            'file' => 'seggiolino-auto-per-bambini.webp',
            'copies' => 1,
            'labels' => ['Comfort', 'Car seat', 'Bag', 'Head restraint', 'Armrest', 'Baggage'],
        ],
    ];

    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        if ($categories->isEmpty()) {
            $this->command?->warn('Nessuna categoria presente: esegui prima le migrazioni/CategoriesSeeder.');

            return;
        }

        $user = User::firstOrCreate(
            ['email' => 'demo@presto.it'],
            ['name' => 'Demo Venditore', 'password' => bcrypt('password')],
        );

        foreach (Article::where('user_id', $user->id)->pluck('id') as $id) {
            Storage::disk('public')->deleteDirectory("articles/{$id}");
        }
        Article::where('user_id', $user->id)->delete();

        foreach ($this->articles as $data) {
            $article = Article::create([
                'title' => $data['title'],
                'city' => $data['city'],
                'description' => "{$data['title']}. Ottime condizioni, usato pochissimo. Vendo per fare spazio. Disponibile a rispondere a domande e a inviare altre foto.",
                'price' => $data['price'],
                'category_id' => $categories[$data['category']],
                'user_id' => $user->id,
                'delivery_pickup' => true,
                'delivery_shipping' => $data['shipping'],
            ]);

            $this->attachImages($article, $data);
        }

        $this->command?->info('Creati '.count($this->articles).' articoli demo.');
    }

    protected function attachImages(Article $article, array $data): void
    {
        $file = $data['file'];
        $source = resource_path("images/demo-articles/{$file}");
        $crop = resource_path("images/demo-articles/crop_400x300/{$file}");

        for ($n = 1; $n <= $data['copies']; $n++) {
            $path = "articles/{$article->id}/{$n}-{$file}";

            Storage::disk('public')->put($path, file_get_contents($source));
            Storage::disk('public')->put("articles/{$article->id}/crop_400x300_{$n}-{$file}", file_get_contents($crop));

            $article->images()->create(['path' => $path])->forceFill([
                'labels' => $data['labels'],
                'adult' => $data['adult'] ?? self::OK,
                'spoof' => $data['spoof'] ?? self::OK,
                'medical' => $data['medical'] ?? self::OK,
                'violence' => $data['violence'] ?? self::OK,
                'racy' => $data['racy'] ?? self::OK,
            ])->save();
        }
    }
}
