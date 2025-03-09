<?php

namespace Luinuxscl\WordpressBasicAuth\Console;

use Illuminate\Console\Command;
use Luinuxscl\WordpressBasicAuth\Models\WordpressCredential;

class StoreCredentialsCommand extends Command
{
    protected $signature = 'wordpress:store-credentials {site_url} {username} {password}';
    protected $description = 'Almacena credenciales de WordPress en la base de datos';

    public function handle()
    {
        WordpressCredential::updateOrCreate(
            ['site_url' => $this->argument('site_url')],
            ['username' => $this->argument('username'), 'password' => $this->argument('password')]
        );

        $this->info('Credenciales guardadas correctamente.');
    }
}
