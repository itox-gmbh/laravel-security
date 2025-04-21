# Laravel security hardening package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/itox-gmbh/laravel-security.svg?style=flat-square)](https://packagist.org/packages/itox-gmbh/laravel-security)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/itox-gmbh/laravel-security/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/itox-gmbh/laravel-security/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/itox-gmbh/laravel-security/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/itox-gmbh/laravel-security/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/itox-gmbh/laravel-security.svg?style=flat-square)](https://packagist.org/packages/itox-gmbh/laravel-security)



## Installation

You can install the package via composer:

```bash
composer require itox-gmbh/laravel-security
```

You can publish and run the migrations with:

```bash
php artisan security:install
```

## Usage
Change the security.php in your config folder to you needs
```php
'enforceSSL' => true,
    'headers' => [
        'hsts' => true,
        'x-frame-options' => 'SAMEORIGIN',
        'x-content-type-options' => 'nosniff',
        'x-xss-protection' => '1; mode=block',
        'permissions-policy' => 'camera=(), microphone=(), geolocation=(), fullscreen=(self), payment=(), accelerometer=(), gyroscope=()',
        'feature-policy' => "camera 'none'; microphone 'none'; geolocation 'none'; fullscreen 'none'; payment 'none'; accelerometer 'none'; gyroscope 'none';",
    ],

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [IToX GmbH](https://github.com/itox-gmbh)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
