

<!-- Name: Muhmmad Fahad
   Student ID : c00311349
   Date: 12/03/2025 -->
<?php 
// this is the data abse connection file
$hostName = "localhost";
$userName = "persons";
$password = "c0031134923" ;
$dbName = "c00311349";
// if query fails  then it show error message
$con = mysqli_connect($hostName,$userName,$password,$dbName);
if (!$con) {
    die("An erro in the SQL: " . mysqli_connect_error());

}
?>