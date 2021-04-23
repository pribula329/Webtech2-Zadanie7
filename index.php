<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="dizajn.css">



</head>
<body >
<?php
include ("api/pocasie.php");
?>
<nav>
    <a href="index.php">Index</a>
 <a href="detail.php">Detaily</a>
    <a href="statistika.php">Štatistika</a>
</nav>
<div class="container">
    <h3>Počasie <?php echo $pocasie->name; ?></h3>
    <div class="datumAcas">
        <div><?php echo datumSK(date("l H:i ",$cas))?></div>
        <div><?php echo datumSK(date("j F Y",$cas))?></div>
        <div><?php echo ucwords($pocasie->weather[0]->description); ?></div>
    </div>
    <div class="weather-forecast">
        <img src="http://openweathermap.org/img/w/<?php echo $pocasie->weather[0]->icon; ?>.png" alt="pocasie">
        <div>Max teplota: <?php echo $pocasie->main->temp_max; ?>°C</div>
        <div>Min teplota: <?php echo $pocasie->main->temp_min; ?>°C</div>
    </div>

        <div>Vlhkosť: <?php echo $pocasie->main->humidity; ?> %</div>
        <div>Vietor: <?php echo $pocasie->wind->speed; ?> km/h</div>

</div>
</body>
</html>