<?php
    $cities_weather = $conn->query("SELECT * FROM city_weather ORDER BY id DESC");

    $weather = "";
    $error = "";
        if ($_GET["city"]) {
            $weatherDataUrl = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET["city"]).",bg&appid=1332df1c36e8154f2e1cbd07a00f2e48");
            $weatherArray = json_decode($weatherDataUrl, true);
            if ($weatherArray["cod"] == 200) {
                $weather = "The weather in ".$_GET["city"]." is currently '".$weatherArray["weather"][0]["description"]."'. ";
                $tempInCelcius = intval($weatherArray["main"]["temp"] - 273);
                $temperature = "The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray["wind"]["speed"]."m/s.";   
            } else {
                $error = "Could not find city - please try again.";           
            }   
        }
?>