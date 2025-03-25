<!-- //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->

<?php
$host = "localhost";
$dbname = "c00311349";
$password = "c0031134923" ;
$user = "persons" ;
try {
    // USED PDO (PHP DATA OBKECT for better error logs)
    //  create a database connection with database credentials
    $connection = new PDO ("mysql:host=$host;dbname=$dbname",$user,$password);
    //  to show error messages 
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Databse Connection failed".$e->getMessage());
}
?>
