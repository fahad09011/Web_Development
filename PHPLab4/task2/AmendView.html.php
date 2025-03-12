<?php
include './Ttask1/db.inc.php'; // Include the database connection
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
    <form action="AmendView.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['personID']; ?>">

        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $row['firstName']; ?>"><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $row['lastName']; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['EmailAddress']; ?>"><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['PhoneNumber']; ?>"><br>

        <label for="dob">DOB:</label>
        <input type="date" name="dob" value="<?php echo $row['DOB']; ?>"><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>