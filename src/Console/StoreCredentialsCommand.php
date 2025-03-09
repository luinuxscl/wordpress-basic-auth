<?php

namespace Luinuxscl\WordpressBasicAuth\Console;

use Illuminate\Console\Command;
use Luinuxscl\WordpressBasicAuth\Models\WordpressCredential;
use Luinuxscl\WordpressBasicAuth\Services\WordpressService;

class StoreCredentialsCommand extends Command
{
    protected $signature = 'wordpress:store-credentials {site_url} {username} {password}';
    protected $description = 'Almacena credenciales de WordPress en la base de datos y verifica conexión';

    public function handle()
    {
        $siteUrl = $this->argument('site_url');
        $username = $this->argument('username');
        $password = $this->argument('password');

        $isConnected = WordpressService::checkConnection($siteUrl, $username, $password);

        WordpressCredential::updateOrCreate(
            ['site_url' => $siteUrl],
            [
                'username' => $username,
                'password' => $password,
                'is_connected' => $isConnected
            ]
        );

        $this->info('Credenciales guardadas correctamente. Conexión: ' . ($isConnected ? 'Exitosa' : 'Fallida'));
    }
}
