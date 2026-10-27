<?php

// Tell browser that the response is JSON
header("Content-Type: application/json");

// Get city from AJAX request
$city = $_GET["city"] ?? "Puducherry";

// Hypothetical weather data
$data = [
    "city" => $city,
    "temperature" => 31,
    "condition" => "Sunny",
    "humidity" => 72,
    "wind_speed" => 15
];

// Convert PHP array into JSON
echo json_encode($data);

?>
