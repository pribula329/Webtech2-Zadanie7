<?php
function pokusLogin(){

    include_once("../config.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=dbPribulikZadanie07",$username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;


}


function vlozData($conn,$IP,$datum,$krajina,$mesto,$kodStranky,$kodKrajiny){
    $stm = $conn->prepare("INSERT INTO statistika (IPadresa, datum, krajina, mesto, kodStranky,kodKrajiny)
                                VALUES (?,?,?,?,?,?)");
    $stm->bindValue(1,$IP);
    $stm->bindValue(2, $datum);
    $stm->bindValue(3, $krajina);
    $stm->bindValue(4, $mesto);
    $stm->bindValue(5, $kodStranky);
    $stm->bindValue(6, $kodKrajiny);

    $stm->execute();
}

function vlozGPS($conn,$sirka,$vyska){
    $stm = $conn->prepare("INSERT INTO suradnice (zs,zv)
                                VALUES (?,?)");
    $stm->bindValue(1,$sirka);
    $stm->bindValue(2, $vyska);

    try {
        $stm->execute();
    }
    catch (PDOException){

    }
}