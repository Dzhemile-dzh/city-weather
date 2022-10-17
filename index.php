

<?php 
    require 'db_conn.php';
    include './app/getWeather.php';
?>
<!DOCTYPE html>  
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/d05e26a373.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City - Weather Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <h3>All cities you want to visit.</h3>
            <h5>The main cities are highlighted.</h5>
            <?php include ('app/getCities.php');?>     
            <h3>Plan your sunny trip!</h3>
            <form>
                <fieldset class="form-group">
                    <small for="city">Enter the name of a city (BG cities allowed).</small>
                    <input type="text" name="city" id="city" placeholder="Eg. Sofia, Plovdiv" value = "<?= $_GET["city"]; ?>">
                </fieldset>           
            </form>
            <div id="weather">
                <?php
                    if ($weather) {  
                        echo '<div class="alert alert-success" role="alert">'.$weather.'<br>'.$temperature.'</div>'; 
                    } else if ($error) {
                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';    
                    }   
                ?>
            </div>
       </div>
       <div class="show-todo-section">
            <h4>Previosly checked cities! </h4>
            <h5>Cities with bad wheather will be showed with <i class="fa-solid fa-cloud-rain"></i> </h5>
            <?php while($city_weather = $cities_weather->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $city_weather['id']; ?>" class="remove-to-do">x</span>
                    <?php if(($city_weather['temperature'] < 12 && $city_weather['temperature'] > 28) || 
                        $city_weather['weather_description'] != 'clear sky'){ 
                        echo '<i class="fa-solid fa-cloud-rain"></i>';}?>
                    <h2><?php echo $city_weather['city_name']; ?></h2>
                    <small><?php  echo 'temperature:'.$city_weather['temperature'].'&deg;C '.$city_weather['weather_description']; ?></small><br>
                    <small>date: <?php echo $city_weather['curr_date'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('.remove-to-do').click(function(){
            const id = $(this).attr('id');
            $.post("app/remove.php", {
                id: id
            },
            (data)  => {
                if(data){
                    $(this).parent().hide(600);
                }
            });
        });
    });
</script>