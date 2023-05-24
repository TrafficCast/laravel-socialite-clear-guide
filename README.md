# This package is a custom Socialite driver for Iteris Clear Guide.

[![GitHub Tests Action Status](https://github.com/TrafficCast/laravel-socialite-clear-guide/actions/workflows/run-tests.yml/badge.svg?branch=main&label=tests&style=flat-square)](https://github.com/trafficcast/laravel-socialite-clear-guide/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://github.com/TrafficCast/laravel-socialite-clear-guide/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main&label=tests&style=flat-square)](https://github.com/trafficcast/laravel-socialite-clear-guide/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)

OAuth2 Authentication with Iteris Clear Guide

## Installation

You can install the package via composer:

```bash
composer require trafficcast/laravel-socialite-clear-guide
```

## Usage

Once you install the package, add the next config values in you config/services.php configuration file:

```
'clear-guide' => [
    'base_uri' => env('CG_BASE_URI', 'http://auth.iteris-clearguide.com'),
    'client_id' => env('CG_CLIENT_ID'),
    'client_secret' => env('CG_CLIENT_SECRET'),
    'redirect' => env('CG_REDIRECT_URI'),
],
```

You can use the driver as you would use it in the Laravel Socialite's official [documentation](https://laravel.com/docs/10.x/socialite#main-content). Use `clear-guide` keyword when you want to instantiate the driver:

Example Login Route:

```php
use Laravel\Socialite\Facades\Socialite;
...
Route::get('/auth/clear-guide', function () {
    return Socialite::driver('clear-guide')->redirect();
})->name('auth.clear-guide');
```

Example callback to get logged in user info

```php
$user = Socialite::driver('clear-guide')->user();
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
