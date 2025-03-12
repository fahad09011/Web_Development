<?php
include 'db.inc.php'; // Include the database connection

// Get the form data
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$code = $_POST['code'];
$grad = $_POST['grad'];
$year = $_POST['beganyear'];



// Update the record in the database
$sql = "UPDATE `student` SET `StudentName`='$name',`StudentAddress`='$address',`StudentPhone`='$phone',`DateOfBirth`='$dob',`CourseCode`='$code',`GradePointAvergare`='$grad',`YearBeganCourse`='$year' WHERE `StudentID`  = '$id' ;";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully!";
} else {
    echo "Error updating record: " . $con->error;
}

$con->close(); // Close the database connection
?>
<form action="listbox.php">
<label for="backtolist"></label>
        <input type="submit" id="backtolist" name="dob" value="Back to List"><br>
</form>