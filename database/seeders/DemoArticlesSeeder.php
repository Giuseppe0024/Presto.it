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

    protected array $visionData = [
        'acquario-60l-completo.webp' => [
            'labels' => [
                'Freshwater aquarium',
                'Fish',
                'Pet Supply',
                'Aquarium Decor',
                'Aquarium',
                'Glass',
                'Aquarium lighting',
                'Fish Supply',
                'Aquatic plant',
                'Algae',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'atlante-geografico-illustrato.webp' => [
            'labels' => [
                'Map',
                'Atlas',
                'Paper',
                'Number',
                'Paper Product',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'cappotto-invernale-in-lana.webp' => [
            'labels' => [
                'Collar',
                'Overcoat',
                'Button',
                'Woolen',
                'Wool',
                'Natural material',
                'Cardigan',
                'One-piece garment',
                'Vintage clothing',
                'Duster',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'casco-integrale-omologato.webp' => [
            'labels' => [
                'Helmet',
                'Motorcycle helmet',
                'Personal protective equipment',
                'Headgear',
                'Protective gear in sports',
                'Visor',
                'Carbon fibers',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'collezione-fumetti-vintage.webp' => [
            'labels' => [
                'Publication',
                'Book',
                'Fictional character',
                'Fiction',
                'Book cover',
                'Comics',
                'Comic book',
                'Poster',
                'Animated cartoon',
                'Magazine',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'cuccia-per-cani-taglia-media.webp' => [
            'labels' => [
                'Cushion',
                'Yellow',
                'Throw pillow',
                'Textile',
                'Furniture',
                'Pillow',
                'Linens',
                'Living room',
                'Couch',
                'Daybed',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'cuffie-bluetooth-over-ear.webp' => [
            'labels' => [
                'Audio equipment',
                'Electronic device',
                'Gadget',
                'Headphones',
                'Peripheral',
                'Technology',
                'Electrical cable',
                'Headset',
                'Communication Device',
                'Electronics',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'felpa-con-cappuccio-oversize.webp' => [
            'labels' => [
                'Sleeve',
                'Shoulder',
                'Neck',
                'Fashion',
                'Orange',
                'Sportswear',
                'Waist',
                'Abdomen',
                'Muscle',
                'Fashion Model',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-danger fa-solid fa-circle-minus',
        ],
        'giacca-in-pelle-vintage.webp' => [
            'labels' => [
                'Shoe',
                'Fashion',
                'Thigh',
                'Knee-high boot',
                'Knee',
                'Waist',
                'High-heeled shoe',
                'Boot',
                'Riding boot',
                'Leather',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-warning fa-solid fa-circle-exclamation',
        ],
        'lampada-da-tavolo-di-design.webp' => [
            'labels' => [
                'Metal',
                'Cylinder',
                'Light fixture',
                'Brass',
                'Nickel',
                'Still life photography',
                'Copper',
                'Bronze',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'macchinina-telecomandata.webp' => [
            'labels' => [
                'Automotive Tire',
                'Car',
                'Automotive Exterior',
                'Automotive lighting',
                'Toy',
                'Automotive Wheel System',
                'Play Vehicle',
                'Model car',
                'Bumper',
                'Hood',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'manuale-di-fotografia.webp' => [
            'labels' => [
                'Book',
                'Paper',
                'Publication',
                'Paper Product',
                'Office supplies',
                'Document',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'mountain-bike-27-5.webp' => [
            'labels' => [
                'Bicycle',
                'Bicycle tire',
                'Bicycle frame',
                'Land vehicle',
                'Bicycle wheel',
                'Wheel',
                'Bicycle Wheel Rim',
                'Bicycle handlebar',
                'Tire',
                'Bicycle chain',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'navigatore-satellitare.webp' => [
            'labels' => [
                'Electronic device',
                'Gadget',
                'Display device',
                'Mobile phone',
                'Portable communications device',
                'Communication Device',
                'Mobile device',
                'Telephony',
                'Electronics',
                'Smartphone',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'occhiali-da-sole-polarizzati.webp' => [
            'labels' => [
                'Eyewear',
                'Black',
                'Sunglasses',
                'Goggles',
                'Silver',
                'Shadow',
                'Still life photography',
                'Night',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'orologio-analogico-in-acciaio.webp' => [
            'labels' => [
                'Watch',
                'Analog watch',
                'Clock',
                'Fashion',
                'Everyday carry',
                'Strap',
                'Number',
                'Glass',
                'Font',
                'Silver',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'peluche-gigante.webp' => [
            'labels' => [
                'Teddy bear',
                'Stuffed toy',
                'Toy',
                'Bear',
                'Baby toys',
                'Brown',
                'Plush',
                'Carnivores',
                'Snout',
                'Fur',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-warning fa-solid fa-circle-exclamation',
        ],
        'phon-professionale-ionico.webp' => [
            'labels' => [
                'Toy',
                'Snout',
                'Machine',
                'Plastic',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-warning fa-solid fa-circle-exclamation',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'piastra-per-capelli-in-ceramica.webp' => [
            'labels' => [
                'Hair iron',
                'Personal care',
                'Hair care',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'portafoglio-in-vera-pelle.webp' => [
            'labels' => [
                'Silver',
                'Leather',
                'Carbon fibers',
                'Still life photography',
                'Wallet',
                'Office supplies',
                'Gadget',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'profumo-eau-de-parfum-100ml.webp' => [
            'labels' => [
                'Blue',
                'Liquid',
                'Bottle',
                'Perfume',
                'Personal care',
                'Glass bottle',
                'Solution',
                'Cosmetics',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'puzzle-1000-pezzi.webp' => [
            'labels' => [
                'Beach',
                'Photographic paper',
                'Picture frame',
                'Canidae',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'racchetta-da-tennis-pro.webp' => [
            'labels' => [
                'Tennis Racket',
                'Tennis player',
                'Tennis',
                'Tennis--Equipment and supplies',
                'Tennis court',
                'Racket',
                'Racquet sport',
                'Sports Uniform',
                'Individual sport',
                'Soft tennis',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-warning fa-solid fa-circle-exclamation',
        ],
        'robot-aspirapolvere.webp' => [
            'labels' => [
                'Electronic device',
                'Technology',
                'Gadget',
                'Electronics',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'romanzo-bestseller-cartonato.webp' => [
            'labels' => [
                'Red',
                'Book',
                'Publication',
                'Book cover',
                'Novel',
                'Varnish',
                'Collection',
                'Wood stain',
                'Library',
                'Self-help book',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'seggiolino-auto-per-bambini.webp' => [
            'labels' => [
                'Comfort',
                'Car seat',
                'Bag',
                'Head restraint',
                'Armrest',
                'Baggage',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'set-costruzioni-500-pezzi.webp' => [
            'labels' => [
                'Red',
                'Orange',
                'Toy block',
                'Building sets',
                'Plastic',
                'Design',
                'Toy',
                'Educational toy',
                'Construction Set Toy',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'set-di-pentole-antiaderenti.webp' => [
            'labels' => [
                'Pot rack',
                'Kitchen',
                'Cookware and bakeware',
                'Kitchen utensil',
                'Frying pan',
                'Shelving',
                'Shelf',
                'Kitchen Appliance',
                'Household hardware',
                'Serveware',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'set-manubri-20kg.webp' => [
            'labels' => [
                'Physical fitness',
                'Muscle',
                'Thorax',
                'Abdomen',
                'Exercise',
                'Dumbbell',
                'Exercise equipment',
                'Torso',
                'Professional fitness coach',
                'Weights',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-warning fa-solid fa-circle-exclamation',
        ],
        'set-pennelli-make-up.webp' => [
            'labels' => [
                'Pink',
                'Brush',
                'Personal care',
                'Makeup brushes',
                'Cosmetics',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'set-pneumatici-estivi.webp' => [
            'labels' => [
                'Automotive Tire',
                'Synthetic rubber',
                'Automotive Wheel System',
                'Tread',
                'Rolling',
                'Tire Care',
                'Automotive Care',
                'Natural rubber',
                'Formula One tyres',
                'Sand',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'smart-tv-50-4k.webp' => [
            'labels' => [
                'Electronic device',
                'Display device',
                'Output device',
                'Peripheral',
                'Computer monitor',
                'Flat-panel display',
                'Technology',
                'Electronics',
                'Television set',
                'LED-backlit LCD',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'smartphone-android-128gb.webp' => [
            'labels' => [
                'Gadget',
                'Electronic device',
                'Communication Device',
                'Portable communications device',
                'Mobile device',
                'Mobile phone',
                'Telephony',
                'Display device',
                'Multimedia',
                'Telephone',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'sneakers-da-running.webp' => [
            'labels' => [
                'Footwear',
                'Shoe',
                'White',
                'Black',
                'Sportswear',
                'Sneakers',
                'Pink',
                'Purple',
                'Walking Shoe',
                'Grey',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'tablet-10-wifi.webp' => [
            'labels' => [
                'Electronic device',
                'Gadget',
                'Display device',
                'Tablet computer',
                'Electronics',
                'Technology',
                'Communication Device',
                'Mobile device',
                'Operating system',
                'Portable communications device',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'tagliaerba-elettrico.webp' => [
            'labels' => [
                'Mower',
                'Lawn mower',
                'Outdoor Power Equipment',
                'Walk-Behind Mower',
                'Lawn',
                'Edger',
                'Tool',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'tapis-roulant-pieghevole.webp' => [
            'labels' => [
                'Flooring',
                'Floor',
                'Window covering',
                'Interior design',
                'Window treatment',
                'Lighting',
                'Furniture',
                'Curtain',
                'Room',
                'Ceiling',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'tiragraffi-per-gatti.webp' => [
            'labels' => [
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'trasportino-da-viaggio.webp' => [
            'labels' => [
                'Cat',
                'Felinae',
                'Felidae',
                'Pet Supply',
                'Whiskers',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-warning fa-solid fa-circle-exclamation',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
        'zaino-impermeabile-30l.webp' => [
            'labels' => [
                'Bag',
                'Baggage',
                'Strap',
                'Mesh',
                'Backpack',
                'Leather',
                'Carbon fibers',
                'Gadget',
            ],
            'adult' => 'text-secondary fa-solid fa-circle-check',
            'spoof' => 'text-secondary fa-solid fa-circle-check',
            'medical' => 'text-secondary fa-solid fa-circle-check',
            'violence' => 'text-secondary fa-solid fa-circle-check',
            'racy' => 'text-secondary fa-solid fa-circle-check',
        ],
    ];

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

        $vision = $this->visionData[$filename] ?? null;

        for ($n = 1; $n <= $count; $n++) {
            $storagePath = "articles/{$article->id}/{$n}-{$filename}";

            Storage::disk('public')->put($storagePath, file_get_contents($sourcePath));

            $image = $article->images()->create(['path' => $storagePath]);

            if ($vision) {
                $image->labels = $vision['labels'];
                $image->adult = $vision['adult'];
                $image->spoof = $vision['spoof'];
                $image->medical = $vision['medical'];
                $image->violence = $vision['violence'];
                $image->racy = $vision['racy'];
                $image->save();
            }

            ResizeImage::dispatchSync($image->path, 400, 300);
        }
    }
}
