<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('city');
            $table->text('description');
            $table->decimal('price');
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->boolean('delivery_shipping')->default(false);
            $table->json('images_to_delete')->nullable();
            $table->string('token');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_revisions');
    }
};
