<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    protected $signature = 'make:user-revisor {email}';

    protected $description = 'Rende un utente revisore';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (! $user) {
            $this->error('Utente non trovato');

            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("L'utente {$user->name} è ora revisore");
    }
}
