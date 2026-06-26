<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{


    protected array $categories = [
        'Elettronica',
        'Abbigliamento',
        'Salute e Bellezza',
        'Casa e Giardino',
        'Giocattoli',
        'Sport',
        'Animali Domestici',
        'Libri e Riviste',
        'Accessori',
        'Motori'
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}