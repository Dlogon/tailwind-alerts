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

You need [tailwind](https://tailwindcss.com/) V2 or V3 and you need to check if your project has the default_alert_colors in your tailwind config file, if not, you can export the config file to change the default colors, or simply you can pass the background color you want in the level parameter.

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
namespace App\Http\Controllers;

use App\Models\MyModel;
use Dlogon\TailwindAlerts\Facades\TailwindAlerts;
class MyController extends Controller
{
    ...
    public function store(Request $request) 
    {
        TailwindAlerts::addSessionMessage("This beautifull asset as been saved", TailwindAlerts::SUCCESS);
        Mymodel::create($request->all())
        return redirect()->route("My.index");
    }
    ...
});
```

Result
![example](example.png?raw=true "example")



the default position and type of the alert is bottom toast, you can use 4 types of alerts, calling the addSessionMessage whit the correct parameters, or calling the helper functions

Then, you can use the facade in any part of your code to add a toast message
```php
use Dlogon\TailwindAlerts\Facades\TailwindAlerts;

TailwindAlerts::addSessionMessage("Bottom toast", "bg-red-300", TailwindAlerts::BOTTOM_TOAST_CONTAINER, TailwindAlerts::TOAST_TEMPLATE );
TailwindAlerts::addBottomToastMessage("Another bottom toast", TailwindAlerts::ERROR);

TailwindAlerts::addTopToastMessage("Top toast", TailwindAlerts::WARNING);
TailwindAlerts::addHeaderMessage("Header line", TailwindAlerts::ERROR);
TailwindAlerts::addFooterMessage("Footer line", TailwindAlerts::DEFAULT_ALERT);
```
Result

![diferent alerts](https://user-images.githubusercontent.com/26014056/197311450-cdef3660-626b-43dc-9f82-18c722e08c32.png)

If your response is not a redirect response, then you should set the 
```$IsResponseRedirect``` static variable to false using the method ```setResponseRedirect(bool $value)``` if you use the helper functions, or you can set the last parameter in ```addSessionMessage()``` to ```false```

```php
use Dlogon\TailwindAlerts\Facades\TailwindAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    TailwindAlerts::setResponseRedirect(false);
    TailwindAlerts::addSessionMessage("Welcome", TailwindAlerts::SUCCESS);
    return view('welcome');
});
```




Where you use the component, you are able to use a javascript function to show alerts

```javascript
AlertToast.showToast("An error", AlertToast.ERROR, AlertToast.TOP_TOAST_CONTAINER, AlertToast.TOAST_TEMPLATE)
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits

- [Diego](https://github.com/Dlogon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
