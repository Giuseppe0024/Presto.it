<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@presto.it'],
            ['name' => 'Admin', 'password' => bcrypt('password')],
        );
        $admin->is_admin = true;
        $admin->save();

        $revisor1 = User::firstOrCreate(
            ['email' => 'revisor1@presto.it'],
            ['name' => 'Revisore Uno', 'password' => bcrypt('password')],
        );
        $revisor1->is_revisor = true;
        $revisor1->save();

        $revisor2 = User::firstOrCreate(
            ['email' => 'revisor2@presto.it'],
            ['name' => 'Revisore Due', 'password' => bcrypt('password')],
        );
        $revisor2->is_revisor = true;
        $revisor2->save();

        User::firstOrCreate(
            ['email' => 'demo@presto.it'],
            ['name' => 'Demo Venditore', 'password' => bcrypt('password')],
        );
    }
}
