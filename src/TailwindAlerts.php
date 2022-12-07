<?php

namespace Dlogon\TailwindAlerts;

use Illuminate\Support\Facades\Session;

class TailwindAlerts implements TailwindAlertsConsts
{
    public $session_name;
    public $alert_colors;
    /**
     * @var bool set false to use helper methods and your response is not a redirect response
     */
    public static bool $IsResponseRedirect = true;

    /**
     */
    public function __construct()
    {
        $this->alert_colors = \array_merge(config("tailwind-alerts.default_alert_colors"), config("tailwind-alerts.new_colors"));
        $this->session_name = config("tailwind-alerts.session_name");
    }

    /**
     * @param string $message
     * @param string $level
     * @param string $container
     * @param string $template
     * @param bool $redirectResponse if your response is not a redirect response, set this false
     *
     * @return array
     */
    public function addSessionMessage(string $message, string $level = self::INFO,string $container = self::BOTTOM_TOAST_CONTAINER,string $template = self::TOAST_TEMPLATE,bool $redirectResponse = true): array
    {

        $currentMessages = (array)Session::get($this->session_name);
        $levelColor = $this->alert_colors[$level] ?? $level;
        $message = [
            "level" => $levelColor,
            "message" => $message,
            "container" => $container,
            "template" => $template
        ];

        $messages = array_merge($currentMessages, [$message]);

        if ($redirectResponse)
            Session::flash($this->session_name, $messages);
        else {
            Session::forget($this->session_name);
            Session::now($this->session_name, $messages);
        }
        return $messages;
    }

    public function setResponseRedirect(bool $value)
    {
        self::$IsResponseRedirect = $value;
    }

    public function addTopToastMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::TOP_TOAST_CONTAINER, self::TOAST_TEMPLATE, self::$IsResponseRedirect);
    }
    public function addBottomToastMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::BOTTOM_TOAST_CONTAINER, self::TOAST_TEMPLATE, self::$IsResponseRedirect);
    }
    public function addHeaderMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::HEADER_CONTAINER, self::LINE_TEMPLATE, self::$IsResponseRedirect);
    }
    public function addFooterMessage($message, $level = self::INFO)
    {
        $this->addSessionMessage($message, $level, self::FOOTER_CONTAINER, self::LINE_TEMPLATE, self::$IsResponseRedirect);
    }
}
