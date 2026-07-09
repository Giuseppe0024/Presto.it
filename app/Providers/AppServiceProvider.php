<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
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
        Paginator::useBootstrapFive();

        /* Rende categories disponibile in tutte le views con la variabile $categories */

        if (Schema::hasTable('categories')) {
            View::share('categories', Category::orderBy('name')->get());
        }

        /* Quando viene lanciato migrate:fresh o migrate:refresh elimina le immagini orfane in storage. */
        Event::listen(function (CommandFinished $event) {
            if ($event->exitCode === 0 && in_array($event->command, ['migrate:fresh', 'migrate:refresh'], true)) {
                Storage::disk('public')->deleteDirectory('articles');
            }
        });
    }
}
