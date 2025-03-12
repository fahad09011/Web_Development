<?php
//Name: Muhmmad Fahad
   //Student ID : c00311349
   //Date: 12/03/2025

include './dbConnection.php'; // Include the database connection

// Get the form data
$id = $_POST['id'];
$name = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];

// Update the record in the database
$sql = "UPDATE `Person` SET `personID`='[value-1]',`firstName`='$name',`lastName`='$lname',`EmailAddress`='$email',`PhoneNumber`='$phone',`DOB`='$dob' WHERE `personID` = '$id' ;";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully!";
} else {
    echo "Error updating record: " . $con->error;
}

$con->close(); // Close the database connection
?>

<form action="../menu.php" method="post">
    <input type="submit" value="Return to Main Page">
</form>