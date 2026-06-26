<?php

use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => CategoriesSeeder::class,
            '--force' => true,
        ]);

    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
