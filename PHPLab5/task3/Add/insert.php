<!-- File Name: insert.php
  Description: this file handles the form submission and process user input then insert into database.
  Name: Muhmmad Fahad
  Student ID : c00311349
  Date: 26/02/2025 -->
 
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="../stle.css">
</head>
<body>
    
<header>
        <nav>
            <ul>
                <li><a href="../Add/task2.php" class="btn">Add Person</a></li>
                <li><a href="../View/listbox.php" class="btn">View Record</a></li>
                <li><a href="../Amend_View/listbox.php" class="btn">Amen/View Details</a></li>
                <li><a href="../menu.php" class="btn">Main Page</a></li>
            </ul>
        </nav>
    </header>
  
</body>
</html>
<?php
 // it include db.inc.php file to insert.php "include is a predefined function"
include( './dbConnection.php');
// predefined function : set the time zone to UTC
date_default_timezone_set("UTC");


// $_SERVER , $_POST is superGlobal variables
// 1.contains the server  (request method ) and execution environment infromation
// 2. when user sub it form using POST , it automatically stores the values that comes from form


// it checks the request method of form . if its match the given method then the if statement runs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "the details sent down are : <br>";

// echo : is used to display information
echo"First name is : " . $_POST['firstName'] . "<br>";
echo"Last name is : " . $_POST['lastName'] . "<br>";
echo"Email Address is : " . $_POST['email'] . "<br>";
echo"Phone Number is : " . $_POST['phone'] . "<br>";

$date=date_create($_POST['dob']);
// date_format : predefined function that formats the date
echo "Date of Birth is : " . date_format($date,"d/m/Y" . "<br>");



//  SQL query to insert data to databse
//    this query retrives data from form while submission
 
$sql="insert into Person (firstName, lastName, EmailAddress, PhoneNumber, DOB) VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[email]', '$_POST[phone]' ,'$_POST[dob]')";



//  mysqli_query (): predefined function to execute the query "$con is the variables that contains the database connectoin information"
//   mysqli_error():predefined function used to show error message if the query fails
 
if (!mysqli_query($con,$sql)) {

    die("An erro in the SQL: " . mysqli_error($con));
}

echo"<br> A record has been added for : " . $_POST['firstName'] . " " . $_POST['lastName'] . "."; 

// mysqli_close() : predefined function used to close the database connection after inserting data (execute query)
mysqli_close($con);
}
?>

<form action="../menu.php" method="post">
    <input type="submit" value="Return to insert Page">
</form>