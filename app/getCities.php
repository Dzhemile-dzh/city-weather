<?php
$getCities = file_get_contents("./cities.json");
$cities = json_decode($getCities, true);
foreach ($cities as $city) {
    foreach ($city as $currentCity) {
        echo '<ul class="list-group-item list-group-item-action active">' . ($currentCity['name']) . '</ul>';
        if ($currentCity['children'] != null) {
            foreach (array_slice($currentCity['children'], 0, 3) as $secondaryCity) {
                echo '<li class="list-group-item">' . ($secondaryCity['name']) . '</li>';
                if ($secondaryCity['children'] != null) {
                    foreach (array_slice($secondaryCity['children'], 0, 3) as $thirdCity) {
                        echo '<li class="list-group-item list-group-item-warning">' . ($thirdCity['name']) . '</li>';
                    }
                }
            }
        }
    }
}
?>