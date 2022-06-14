# Tailwind-alerts

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dlogon/tailwind-alerts.svg?style=flat-square)](https://packagist.org/packages/dlogon/tailwind-alerts)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/dlogon/tailwind-alerts/run-tests?label=tests)](https://github.com/dlogon/tailwind-alerts/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/dlogon/tailwind-alerts/Check%20&%20fix%20styling?label=code%20style)](https://github.com/dlogon/tailwind-alerts/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dlogon/tailwind-alerts.svg?style=flat-square)](https://packagist.org/packages/dlogon/tailwind-alerts)

Add tailwind alerts to your page with a single facade call
```php
TailwindAlerts::addSessionMessage("This beautifull asset as been saved", TailwindAlerts::SUCCESS);
```


## Installation

You can install the package via composer:

```bash
composer require dlogon/tailwind-alerts
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Dlogon\TailwindAlerts\TailwindAlertsServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
"default_alert_colors" =>
    [
        "SUCCESS" => "bg-green-500",
        "ERROR" => "bg-red-500",
        "WARNING" => "bg-yellow-500",
        "INFO" => "bg-blue-500"
    ],

    "session_name" => env("TAILWIND_ALERTS", "tailwind_alerts"),

    "new_colors" => []
```

## Usage

add this [Blade template](https://laravel.com/docs/9.x/blade)   
inside your viewport html wrapper

```php
@tailwind_alerts
```
or you can choose the component style
```html
<x-tailwindalerts::tailwind-alert/>
```

Then, you can use the facade in any part of your code to add a toast message
```php
use Dlogon\TailwindAlerts\Facades\TailwindAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    TailwindAlerts::addSessionMessage("This beautifull asset as been saved", TailwindAlerts::SUCCESS);
    return view('welcome');
});
```

Result
![example](example.png?raw=true "example")

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Diego](https://github.com/Dlogon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
