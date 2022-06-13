<?php

return [

    "default_alert_colors" =>
    [
        "SUCCESS" => "bg-green-500",
        "ERROR" => "bg-red-500",
        "WARNING" => "bg-yellow-500",
        "INFO" => "bg-blue-500"
    ],

    "session_name" => env("TAILWIND_ALERTS", "tailwind_alerts"),

    "new_colors" => []
];
