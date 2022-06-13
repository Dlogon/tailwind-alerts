<?php

namespace Dlogon\TailwindAlerts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\Skeleton
 */
class TailwindAlerts extends Facade
{
    const SUCCESS = "SUCCESS";
    const ERROR = "ERROR";
    const WARNING = "WARNING";
    const INFO = "INFO";

    protected static function getFacadeAccessor()
    {
        return 'tailwindalerts';
    }
}
