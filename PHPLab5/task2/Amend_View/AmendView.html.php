
<?php
//Name: Muhmmad Fahad
   //Student ID : c00311349
   //Date: 12/03/2025

include './dbConnection.php'; // Include the database connection
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
 <div class="inputmain">
        <input type="hidden" name="id" value="<?php echo $row['personID']; ?>">
</div>
	  <div class="inputmain">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $row['firstName']; ?>"><br>
      </div>  
		  
		   <div class="inputmain">
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $row['lastName']; ?>"><br>
</div>
			   
			    <div class="inputmain">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['EmailAddress']; ?>"><br>
</div>
					
					 <div class="inputmain">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['PhoneNumber']; ?>"><br>
</div>
						  <div class="inputmain">
        <label for="dob">DOB:</label>
        <input type="date" name="dob" value="<?php echo $row['DOB']; ?>"><br>
      </div>  
        <button type="submit">Update</button>
    </form>
</body>
</html>