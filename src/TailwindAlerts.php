<?php

namespace Dlogon\TailwindAlerts;
use Illuminate\Support\Facades\Session;

class TailwindAlerts implements TailwindAlertsConsts
{
    public $session_name;
    public $alert_colors;


    public function __construct()
    {
        $this->alert_colors = \array_merge(config("tailwind-alerts.default_alert_colors"), config("tailwind-alerts.new_colors"));
        $this->session_name = config("tailwind-alerts.session_name");
    }
    public function addSessionMessage($message, $level = self::INFO, $container = self::BOTTOM_TOAST_CONTAINER, $template = self::TOAST_TEMPLATE )
    {

        $currentMessages = (array)Session::get($this->session_name);
        $levelColor = $this->alert_colors[$level] ?? $level;
        $message = [
            "level" => $levelColor,
            "message" => $message,
            "container" => $container,
            "template" => $template
        ];
        Session::forget($this->session_name);
        Session::now($this->session_name, array_merge($currentMessages, [$message]));
    }

    public function addTopToastMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::TOP_TOAST_CONTAINER, self::TOAST_TEMPLATE);
    }
    public function addBottomToastMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::BOTTOM_TOAST_CONTAINER, self::TOAST_TEMPLATE);
    }
    public function addHeaderMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::HEADER_CONTAINER, self::LINE_TEMPLATE);
    }
    public function addFooterMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::FOOTER_CONTAINER, self::LINE_TEMPLATE);
    }
}
