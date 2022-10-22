<?php

namespace Dlogon\TailwindAlerts\Facades;

use Illuminate\Support\Facades\Facade;
use Dlogon\TailwindAlerts\TailwindAlertsConsts;

/**
 * @see Dlogon\TailwindAlerts\TailwindAlerts
 */
class TailwindAlerts extends Facade implements TailwindAlertsConsts
{
    protected static function getFacadeAccessor()
    {
        return 'tailwindalerts';
    }
}
