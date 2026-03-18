<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promote a user to admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }

        $user->is_admin = true;
        $user->save();

        $this->info('Utente promosso ad admin con successo!');
    }
}
