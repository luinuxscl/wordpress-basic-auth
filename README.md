# WordPress Basic Auth

[![Latest Version on Packagist](https://img.shields.io/packagist/v/luinuxscl/wordpress-basic-auth.svg?style=flat-square)](https://packagist.org/packages/luinuxscl/wordpress-basic-auth)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/luinuxscl/wordpress-basic-auth/run-tests.yml?branch=main&label=tests)](https://github.com/luinuxscl/wordpress-basic-auth/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/luinuxscl/wordpress-basic-auth.svg?style=flat-square)](https://packagist.org/packages/luinuxscl/wordpress-basic-auth)

Un paquete de Laravel que proporciona autenticación básica y funcionalidades CRUD para interactuar con la API REST de WordPress.

## Características

- Autenticación básica con WordPress
- CRUD completo para publicaciones
- Verificación de conexión automática
- Interfaz de línea de comandos para gestión de credenciales
- Integración con Livewire para una interfaz de usuario amigable
- Soporte para múltiples sitios WordPress

## Requisitos

- PHP 8.2 o superior
- Laravel 10.0 o superior
- WordPress 5.4 o superior (con la API REST habilitada)

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

### Verificación de conexión automática
Cuando se almacenan credenciales, el sistema intentará hacer `ping` al WordPress y guardará si hay conexión o no.

## Uso del servicio WordpressPostService
```php
use Luinuxscl\WordpressBasicAuth\Services\WordpressPostService;

$service = new WordpressPostService();
$posts = $service->getPosts('https://example.com');
$post = $service->createPost('https://example.com', ['title' => 'Nuevo Post', 'content' => 'Contenido del post']);
$updatedPost = $service->updatePost('https://example.com', 1, ['title' => 'Título actualizado']);
$service->deletePost('https://example.com', 1);
```

## Pruebas

```bash
composer test
```

## Versionado

Este proyecto sigue [Versionado Semántico 2.0.0](https://semver.org/). Consulta el [CHANGELOG](CHANGELOG.md) para ver los cambios notables entre versiones.

## Contribuir

¡Las contribuciones son bienvenidas! Si encuentras algún error o tienes sugerencias, por favor abre un issue o envía un pull request.

### Proceso de desarrollo

1. Haz un fork del repositorio
2. Crea una rama para tu característica (`git checkout -b feature/amazing-feature`)
3. Haz commit de tus cambios (`git commit -m 'Add some amazing feature'`)
4. Haz push a la rama (`git push origin feature/amazing-feature`)
5. Abre un Pull Request

### Estándares de código

- Sigue [PSR-12](https://www.php-fig.org/psr/psr-12/) para el estilo de código
- Escribe pruebas para nuevas funcionalidades
- Documenta los cambios en el CHANGELOG.md
- Actualiza la documentación cuando sea necesario

## Seguridad

Si descubres alguna vulnerabilidad de seguridad, por favor envía un correo a lsepulveda@outlook.com en lugar de usar el rastreador de problemas.

## Créditos

- [Luis Sepúlveda](https://github.com/luinuxscl)
- [Todos los colaboradores](https://github.com/luinuxscl/wordpress-basic-auth/contributors)

## Licencia

El paquete está disponible bajo la [Licencia MIT](LICENSE.md).

---

Hecho con ❤️ por [Luis Sepúlveda](https://github.com/luinuxscl)