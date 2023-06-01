<?php

$city = "Логойск";

$temperatures = array();

$weatherSites = array(
    "weather1.html",
    "weather2.html",
    "weather3.html",
    "weather4.html",
    "weather5.html"
);

function parse_temperature($data) {
    preg_match('/<span class="unit unit_temperature_c">([\d.]+)<\/span>/', $data, $matches);
    return isset($matches[1]) ? (float) $matches[1] : null;
}

foreach ($weatherSites as $site) {
    $weatherData = file_get_contents($site);
    $temperature = parse_temperature($weatherData);
    if ($temperature !== null) {
        $temperatures[] = $temperature;
    }
}

$averageTemperature = count($temperatures) > 0 ? array_sum($temperatures) / count($temperatures) : 0;

echo "Средняя погода в городе $city: " . round($averageTemperature, 2) . " градусов по цельсию.";