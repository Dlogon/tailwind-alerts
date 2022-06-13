<?php

namespace Dlogon\TailwindAlerts;
use Illuminate\Support\Facades\Session;

class TailwindAlerts
{
    const DEFAULT_ALERT = "bg-blue-500";
    const SUCCESS = "SUCCESS";
    const ERROR = "ERROR";
    const WARNING = "WARNING";
    const INFO = "INFO";
    public $session_name;
    public $alert_types;


    public function __construct()
    {
        $this->alert_types = \array_merge(config("tailwind-alerts.default_alert_colors"), config("tailwind-alerts.new_colors"));
        $this->session_name = config("tailwind-alerts.session_name");
    }
    public function addSessionMessage($message, $level = self::INFO)
    {

        $currentMessages = (array)Session::get($this->session_name);
        $levelColor = $this->alert_types[$level] ?? self::DEFAULT_ALERT;
        $message = [
            "level" => $levelColor,
            "message" => $message
        ];
        Session::forget($this->session_name);
        Session::now($this->session_name, array_merge($currentMessages, [$message]));
    }
}
