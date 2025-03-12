<?php 
$hostName = "localhost";
$userName = "persons";
$password = "c0031134923" ;
$dbName = "c00311349";
$con = mysqli_connect($hostName,$userName,$password,$dbName);
if (!$con) {
    die("An erro in the SQL: " . mysqli_connect_error());

}
?>