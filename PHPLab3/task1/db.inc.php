/**
 * File Name: db_inc.php
 * Description: this file handles the form submission and process user input then insert into database.
 * Name: Muhmmad Fahad
 * Student ID : c00311349
 * Date: 26/02/2025
 
 */
<?php

$hostname = "localhost"; //name of host
$username= "persons"; // user name 
$password="fahad@1029"; // password
$dbname="c00311349"; // database name
$con = mysqli_connect($hostname,$username,$password,$dbname); //mysqli_connect is function tused to open a new connection with mysql server to connect with mysql database . $con contain mysqli function
if(!$con){
        /*
     * mysqli_connect_error() is a predefined function that returns the error description 
     * when the connection to MySQL fails.
     */
    die("An erro in the SQL: " . mysqli_connect_error());
}

?>
