<?php

namespace Luinuxscl\WordpressBasicAuth\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'wordpress:install';
    protected $description = 'Instala todas las publicaciones necesarias para Wordpress Basic Auth';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'wordpress-basic-auth-config']);
        $this->call('vendor:publish', ['--tag' => 'wordpress-basic-auth-views']);
        $this->call('vendor:publish', ['--tag' => 'wordpress-basic-auth-translations']);

        $this->info('Todas las publicaciones necesarias han sido instaladas.');
    }
}
