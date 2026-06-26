<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//    Seeding categorie fatto a migration, usare solo per aggiungere altre categorie se necessario in locale
//        $this->call(CategoriesSeeder::class);
    }
}
