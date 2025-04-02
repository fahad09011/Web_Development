<!-- //  File Name: task1 Security lab
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->
<?php

$host = 'localhost';
$dbname = 'c00311349';
$user = 'persons';
$pass = 'c0031134923';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>