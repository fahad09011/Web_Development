<?php 
//Name: Muhmmad Fahad
   //Student ID : c00311349
   //Date: 12/03/2025

include './dbConnection.php';

$sql = "SELECT personID, firstName, lastName  FROM Person" ;
$result = $con->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h2>Select Person</h2>
    <form action="AmendView.html.php" method="get">
        <select name="id">
<?php
//this is file for display data on the list box -->

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['personID']}'>
    {$row['firstName']}{$row['lastName']}</option>";
}
?>
        </select>
        <button type="submit">View Details</button>
    </form>
</body>
</html>