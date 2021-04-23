<?php
include("errors.php");

include("funkcie.php");
include ("databaza.php");

//https://ipapi.co/api/
//https://home.openweathermap.org/

$IP = $_SERVER['REMOTE_ADDR'];
$json = json_decode(dataIP($IP));
date_default_timezone_set($json->timezone);
$cas = time();
$datum = date('Y-m-d H:i:s', $cas);
$conn = pokusLogin();

vlozData($conn,$json->query,$datum,$json->country,$json->city,3,$json->countryCode);
vlozGPS($conn,$json->lat,$json->lon);
function navstevnostPodlaKrajin($conn){
    $sql = "SELECT count(distinct IPadresa, CAST(datum as date )),kodKrajiny, krajina from statistika group by kodKrajiny,krajina";
    $stm = $conn->query($sql);
    $pole = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $pole;
}

function navstevnostPodlaStranok($conn){
    $sql ="SELECT count(distinct IPadresa, CAST(datum as date )),kodStranky from statistika group by kodStranky;";
    $stm = $conn->query($sql);
    $pole2 = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $pole2;
}

function cas615($conn){
    $sql ="SELECT count(distinct IPadresa,cast(datum as date ))  from statistika where CAST(datum as time) >= '06:00:00'
                                                                                   and CAST(datum as time) < '15:00:00';";
    $stm = $conn->query($sql);
    $cas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $cas;
}

function cas1521($conn){
    $sql ="SELECT count(distinct IPadresa,cast(datum as date ))  from statistika where CAST(datum as time) >= '15:00:00'
                                                                                   and CAST(datum as time) < '21:00:00';";
    $stm = $conn->query($sql);
    $cas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $cas;
}
function cas2124($conn){
    $sql ="SELECT count(distinct IPadresa,cast(datum as date ))  from statistika where CAST(datum as time) >= '21:00:00'
                                                                                   and CAST(datum as time) < '24:00:00';";
    $stm = $conn->query($sql);
    $cas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $cas;
}
function cas246($conn){
    $sql ="SELECT count(distinct IPadresa,cast(datum as date ))  from statistika where CAST(datum as time) >= '24:00:00'
                                                                                   and CAST(datum as time) < '06:00:00';";
    $stm = $conn->query($sql);
    $cas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $cas;
}

function suradnice($conn){
    $sql ="SELECT *  from suradnice;";
    $stm = $conn->query($sql);
    $suradnice = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $suradnice;
}