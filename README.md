# This package is a custom Socialite driver for Iteris Clear Guide.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/trafficcast/laravel-socialite-clear-guide.svg?style=flat-square)](https://packagist.org/packages/trafficcast/laravel-socialite-clear-guide)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/trafficcast/laravel-socialite-clear-guide/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/trafficcast/laravel-socialite-clear-guide/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/trafficcast/laravel-socialite-clear-guide/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/trafficcast/laravel-socialite-clear-guide/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/trafficcast/laravel-socialite-clear-guide.svg?style=flat-square)](https://packagist.org/packages/trafficcast/laravel-socialite-clear-guide)

OAuth2 Authentication with Iteris Clear Guide

## Installation

You can install the package via composer:

```bash
composer require trafficcast/laravel-socialite-clear-guide
```

## Usage

```php
$socialiteClearGuide = new TrafficCast\SocialiteClearGuide();
echo $socialiteClearGuide->echoPhrase('Hello, TrafficCast!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Steve Williamson](https://github.com/TrafficCast)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.