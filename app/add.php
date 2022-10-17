<?php

if(isset($_POST['city_name'])){
    require '../db_conn.php';

    $city_name = $_POST['city_name'];
    $weather_description = $_POST['weather_desription'];
    $temperature = $_POST['temperature'];
    $wind_speed = $_POST['wind_speed'];
    $curr_date = $_POST['curr_date'];

    if(empty($city_name)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO city_weather(id, city_name, weather_description, temperature, wind_speed, curr_date) VALUE(?, ?, ?, ?, ?, ?)");
        $res = $stmt->execute([$city_name]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}