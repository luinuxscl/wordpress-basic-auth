# Wordpress Basic Auth

Package mínimo para autenticación básica con WordPress en Laravel.

## Instalación
```sh
composer require luinuxscl/wordpress-basic-auth
php artisan migrate
```

## Uso
```sh
php artisan wordpress:store-credentials https://example.com admin password
php artisan wordpress:ping https://example.com
```

## Pruebas
```sh
vendor/bin/phpunit
```