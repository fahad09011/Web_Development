<?php
include 'db.inc.php'; // Include the database connection
include 'listbox.php' ;

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record from the database
    $sql = "SELECT * FROM student WHERE StudentID = $id ;";
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
    <form action="AmendView.php" method="POST" id="form">
		
		
		 <label for="id">Student ID:</label>
        <input type="text" name="id" id="id" value="<?php echo $row['StudentID']; ?>" readonly>

        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['StudentName']; ?>"><br>
        
        <label for="address">Student Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['StudentAddress']; ?>"><br>

        <label for="phone">Student Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['StudentPhone']; ?>"><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" value="<?php echo $row['DateOfBirth']; ?>"><br>

        <label for="code">Course Code:</label>
        <input type="text" name="code" id="code" value="<?php echo $row['CourseCode']; ?>"  pattern="[A-Za-z]{2}\d{3}"  title="Course Code must the this pattern 2alphabet with following 3 digits"><br>

        <label for="grad">Grade Points:</label>
        <input type="text" name="grad" id="grad" value="<?php echo $row['GradePointAvergare']; ?>"><br>

        <label for="beganyear">Course Year:</label>
        <input type="date" name="beganyear" id="beganyear" value="<?php echo $row['YearBeganCourse']; ?>"><br>
        
        <button type="submit">Update</button>
    </form>
    <script src="task4script.js"></script>
</body>
</html>