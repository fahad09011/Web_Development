<?php
$host = "localhost";
$dbname = "c00311349";
$password = "c0031134923" ;
$user = "persons" ;

try {
    $connection = new PDO ("mysql:host=$host;dbname=$dbname",$user,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Databse Connection failed".$e->getMessage());
}


?>
