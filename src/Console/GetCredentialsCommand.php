<?php

namespace Luinuxscl\WordpressBasicAuth\Console;

use Illuminate\Console\Command;
use Luinuxscl\WordpressBasicAuth\Models\WordpressCredential;

class GetCredentialsCommand extends Command
{
    protected $signature = 'wordpress:get-credentials {site_url?}';
    protected $description = 'Obtiene credenciales de WordPress de la base de datos';

    public function handle()
    {
        $siteUrl = $this->argument('site_url');

        if ($siteUrl) {
            // Busca por URL específica
            $credential = WordpressCredential::where('site_url', $siteUrl)->first();

            if (!$credential) {
                $this->error("No se encontraron credenciales para el sitio: {$siteUrl}");
                return 1;
            }

            $this->displayCredential($credential);
        } else {
            // Muestra todas las credenciales si no se especificó una URL
            $credentials = WordpressCredential::all();

            if ($credentials->isEmpty()) {
                $this->info('No hay credenciales almacenadas en la base de datos.');
                return 0;
            }

            $this->info('Credenciales WordPress almacenadas:');
            $this->table(
                ['URL del sitio', 'Usuario', 'Contraseña'],
                $credentials->map(function ($credential) {
                    return [
                        $credential->site_url,
                        $credential->username,
                        $this->maskPassword($credential->password)
                    ];
                })
            );
        }

        return 0;
    }

    /**
     * Muestra información detallada de una credencial
     */
    private function displayCredential(WordpressCredential $credential)
    {
        $this->info("Credencial para: {$credential->site_url}");
        $this->line("Usuario: {$credential->username}");
        $this->line("Contraseña: " . $this->maskPassword($credential->password));

        // Opción para mostrar la contraseña completa
        if ($this->confirm('¿Desea revelar la contraseña completa?', false)) {
            $this->line("Contraseña: {$credential->password}");
        }
    }

    /**
     * Enmascara la contraseña por razones de seguridad
     */
    private function maskPassword(string $password): string
    {
        if (strlen($password) <= 2) {
            return '****';
        }

        return substr($password, 0, 2) . str_repeat('*', strlen($password) - 2);
    }
}
