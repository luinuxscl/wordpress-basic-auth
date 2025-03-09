<?php

namespace Luinuxscl\WordpressBasicAuth;

use Illuminate\Support\ServiceProvider;

class WordpressBasicAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/wordpress_basic_auth.php', 'wordpress_basic_auth');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Luinuxscl\WordpressBasicAuth\Console\StoreCredentialsCommand::class,
                \Luinuxscl\WordpressBasicAuth\Console\PingWordpressCommand::class,
                \Luinuxscl\WordpressBasicAuth\Console\ListSitesCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/wordpress_basic_auth.php' => config_path('wordpress_basic_auth.php'),
            ], 'wordpress-basic-auth-config');
        }
    }
}
