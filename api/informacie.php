<?php
include ("errors.php");
include ("funkcie.php");
include ("databaza.php");
$IP = $_SERVER['REMOTE_ADDR'];
$json = json_decode(dataIP($IP));
//$site = "details";

date_default_timezone_set($json->timezone);
$ipAdresa = $json->query;
$krajina = $json->country;
$region = $json->regionName;
$mesto =  $json->city;
//prerobit gps
$gps = "Zemepisná šírka: " . $json->lat . " " . "Zemepisná výška: " . $json->lon;
$countryCode = $json->countryCode;

$datum = date('Y-m-d H:i:s', time());
$conn = pokusLogin();

vlozData($conn,$ipAdresa,$datum,$krajina,$mesto,2,$json->countryCode);
vlozGPS($conn,$json->lat,$json->lon);