<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="dizajn.css">



</head>
<body >
<nav>
    <a href="index.php">Index</a>
    <a href="detail.php">Detaily</a>
    <a href="statistika.php">Štatistika</a>
</nav>
<?php
include ("api/informacie.php");
?>
<div class="container border center mar-top">
    <main>
        <div class="row">
            <table id="table">
                <tbody>
                <tr>
                    <td>Ip adresa</td>
                    <td><?php echo $ipAdresa; ?></td>
</tr>
<tr>
    <td>GPS súradnice</td>
    <td><?php echo $gps; ?></td>
</tr>
<tr>
    <td>Mesto</td>
    <td><?php echo $mesto; ?></td>
</tr>
<tr>
    <td>Štát</td>
    <td><?php echo $krajina; ?></td>
</tr>
<tr>
    <td>Region</td>
    <td><?php echo $region ; ?></td>
</tr>
</tbody>
</table>
</div>