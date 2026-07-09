<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $this->call(UsersSeeder::class);
        $this->call(DemoArticlesSeeder::class);
    }
}
