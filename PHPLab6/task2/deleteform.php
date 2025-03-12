
<!-- Name: Muhmmad Fahad
   Student ID : c00311349
   Date: 12/03/2025 -->
<?php
// thismis the sql query section where selecting the detialsof a person according to thier ID
include './dbConnection.php';
//database connection
include 'listbox.php' ;

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record from the database
    $sql = "SELECT * FROM Person WHERE personID = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Record not found.");
    }
} else {
    die("No ID specified.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amend User Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Amend User Details</h1>
    <form action="delete.php" method="POST" id="form">
        <!-- this is the form for showing the details of a person fetche from database according to ID -->
        <input type="hidden" name="id" value="<?php echo $row['personID']; ?>" readonly>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $row['firstName']; ?>" readonly><br>
        
        <!-- this is the form for showing the details of a person fetche from database according to ID -->
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $row['lastName']; ?>" readonly><br>

        <!-- this is the form for showing the details of a person fetche from database according to ID -->
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['EmailAddress']; ?>" readonly><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['PhoneNumber']; ?>" readonly><br>

        <!-- this is the form for showing the details of a person fetche from database according to ID -->
        <label for="dob">DOB:</label>
        <input type="date" name="dob" value="<?php echo $row['DOB']; ?>" readonly><br>
        
        <button type="submit">Delete</button>
    </form>
    <script src="./task3script.js"></script>
</body>
</html>