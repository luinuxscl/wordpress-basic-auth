<?php

namespace Luinuxscl\WordpressBasicAuth\Console;

use Illuminate\Console\Command;
use Luinuxscl\WordpressBasicAuth\Models\WordpressCredential;
use Illuminate\Support\Facades\Http;

class PingWordpressCommand extends Command
{
    protected $signature = 'wordpress:ping {site_url}';
    protected $description = 'Verifica si el sitio WordPress está accesible';

    public function handle()
    {
        $siteUrl = $this->argument('site_url');
        $credential = WordpressCredential::where('site_url', $siteUrl)->first();

        if (!$credential) {
            $this->error('No se encontraron credenciales para este sitio.');
            return;
        }

        $response = Http::withBasicAuth($credential->username, $credential->password)->get("{$siteUrl}/wp-json/wp/v2/posts");

        if ($response->successful()) {
            $this->info("Conexión exitosa con {$siteUrl}");
        } else {
            $this->error("Error al conectar con {$siteUrl}: " . $response->status());
        }
    }
}
