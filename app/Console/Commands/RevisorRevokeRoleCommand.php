<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RevisorRevokeRoleCommand extends Command
{
    protected $signature = 'revisor:revoke-role {email}';

    protected $description = 'Rimuove il ruolo di revisore';

    public function handle(): void
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (! $user) {

            $this->error('Utente non trovato');

            return;
        } elseif (! $user->is_revisor) {

            $this->error("L'utente selezionato non è un revisore");

            return;
        }

        $user->is_revisor = false;
        $user->save();
        $this->info("L'utente {$user->name} non è piú revisore");
    }
}
