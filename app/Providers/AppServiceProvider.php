<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
/* Rende categories disponibile in tutte le views con la variabile $categories */

        if (Schema::hasTable('categories')) {
            View::share('categories', Category::orderBy('name')->get());
        }
    }
}
