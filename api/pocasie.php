<?php

include("errors.php");

include("funkcie.php");
include ("databaza.php");

//https://ipapi.co/api/
//https://home.openweathermap.org/

$IP = $_SERVER['REMOTE_ADDR'];
$json = json_decode(dataIP($IP));
$mesto = $json->city;
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $mesto . "&lang=sk&units=metric&appid=1ac5b31abdfd62e3b72ed42d1e6b4af3";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$pocasie = json_decode($response);
date_default_timezone_set($json->timezone);
$cas = time();
$datum = date('Y-m-d H:i:s', $cas);
$conn = pokusLogin();

vlozData($conn,$json->query,$datum,$json->country,$json->city,1,$json->countryCode);
vlozGPS($conn,$json->lat,$json->lon);