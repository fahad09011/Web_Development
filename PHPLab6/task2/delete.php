
<!-- Name: Muhmmad Fahad
   Student ID : c00311349
   Date: 12/03/2025 -->
<?php
include './dbConnection.php';// Include the database connection
// this is php file for detele data form database table
// Get the form data
$id = $_POST['id'];
$name = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];

// Update the record in the database
$sql = "DELETE FROM `Person` WHERE `personID` = '$id' ;";
// if query fails  then it show error message 
if ($con->query($sql) === TRUE) {
    echo "Record updated successfully!";
} else {
    echo "Error updating record: " . $con->error;
}

$con->close(); // Close the database connection
?>