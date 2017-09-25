<?php
    session_start();
    //header("Content-Type: application/json; charset=UTF-8");
//    $servername = "localhost";
//    $username = "ashwanigupta98";//thacouncil2016
//    $password = "Himansh9830!";//Epignosis@2k17
//    $dbname = "facebook";//epignosis2k17
    
    $servername = "localhost";
$username = "thacouncil2016"; //thacouncil2016
$password = "Epignosis@2k17"; //Epignosis@2k17
$dbname = "epignosis2k17"; //epignosis2k17

$conn = new mysqli($servername, $username, $password,$dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "DataBase Connected successfully"."<br/>";
    
    
    
?>