<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <link rel="stylesheet" href="dizajn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>




</head>
<body >

<?php
include ("api/statUdaje.php");
$pole = navstevnostPodlaKrajin($conn);
$pole2 = navstevnostPodlaStranok($conn);
$cas615 = cas615($conn);
$cas246 = cas246($conn);
$cas1521 = cas1521($conn);
$cas2124 = cas2124($conn);

?>
<nav>
    <a href="index.php">Index</a>
    <a href="detail.php">Detaily</a>
    <a href="statistika.php">Štatistika</a>
</nav>
<table id="tableNavstevnostKrajin">
    <thead>
    <tr>
        <th colspan="2">Krajina</th>
        <th>Počet návštev</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach($pole as $jeden){
        $img = strtolower($jeden['kodKrajiny']);
        $imgPath = 'http://www.geonames.org/flags/x/'.$img.'.gif';
        $img = "<img style='width: 20px;height: auto' src='$imgPath'>";
        echo "<tr>
                  <td>".$jeden['krajina']."</td>
                  <td>".$img."</td>
                  <td>".$jeden['count(distinct IPadresa, CAST(datum as date ))']."</td>
              </tr>";

    }
    ?>
    </tbody>
</table>

<table id="tableNavstevnostStranok">
    <thead>
    <tr>
        <th>Stranka</th>
        <th>Počet návštev</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach($pole2 as $jeden){
       if ($jeden['kodStranky']==1){
           $nazov = "Index";
       }
       elseif ($jeden['kodStranky']==2){
           $nazov = "Detaily";
       }
       else{
           $nazov = "Štatistika";
       }
        echo "<tr>
                  <td>".$nazov."</td>
                  <td>".$jeden['count(distinct IPadresa, CAST(datum as date ))']."</td>
              </tr>";

    }
    ?>
    </tbody>
</table>
<table id="tableNavstevnostCas">
    <thead>
    <tr>
        <th>Čas návštevy</th>
        <th>Počet návštev</th>
    </tr>
    </thead>
    <tbody>
    <?php

        echo "<tr>
                  <td>06:00 - 15:00</td>
                  <td>".$cas615[0]['count(distinct IPadresa,cast(datum as date ))']."</td>
              </tr>
              <tr>
                  <td>15:00 - 21:00</td>
                  <td>".$cas1521[0]['count(distinct IPadresa,cast(datum as date ))']."</td>
              </tr>
              <tr>
                  <td>21:00 - 24:00</td>
                  <td>".$cas2124[0]['count(distinct IPadresa,cast(datum as date ))']."</td>
              </tr>
              <tr>
                  <td>24:00 - 06:00</td>
                  <td>".$cas246[0]['count(distinct IPadresa,cast(datum as date ))']."</td>
              </tr>";


    ?>
    </tbody>
</table>
<main class="container">
    <div class="row">
        <div class="col-12" id="mapid">


        </div>
    </div>
</main>
<script src="script.js"></script>
<script>
    <?php
    $poleGPS = suradnice($conn);
    foreach ($poleGPS as $jeden){
       $zs=floatval($jeden['zs']);
        $zv=floatval($jeden['zv']);
        echo 'vytvorMark('.$zs.','.$zv.');';
    }


    ?>
</script>


</body>

</html>
