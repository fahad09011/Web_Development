<!--
  File Name: task3insert.php
  Description: this file handles the form submission and process user input then insert into database.
  Name: Muhmmad Fahad
  Student ID : c00311349
 Date: 26/02/2025
 
  -->

<?php
// it include db.inc.php file to insert.php
include( '../task1/db.inc.php'); 
date_default_timezone_set("UTC");
// it checks the request method of form . if its match the given method then the if statement runs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "the details sent down are : <br>";


echo"Student name is : " . $_POST['name'] . "<br>";
echo"Student address is : " . $_POST['address'] . "<br>";
echo"Student Phone number  is : " . $_POST['phone_number'] . "<br>";
echo"Course Code is : " . $_POST['course_code'] . "<br>";
$date=date_create($_POST['dob']);
echo "Date of Birth is : " . date_format($date,"d/m/Y" . "<br>");

$sql="INSERT INTO `student`(`StudentName`, `StudentAddress`, `StudentPhone`, `DateOfBirth`, `CourseCode`) VALUES ('$_POST[name]', '$_POST[address]', '$_POST[phone_number]', '$_POST[dob]' ,'$_POST[course_code]')";

if (!mysqli_query($con,$sql)) {

    die("An erro in the SQL: " . mysqli_error($con));
}

echo"<br> A record has been added for : " . $_POST['name'] . " " . $_POST['course_code'] . "."; 

mysqli_close($con);
}
?>
<form action="task3.html" method="post">
    <input type="submit" value="Return to insert Page">
</form>