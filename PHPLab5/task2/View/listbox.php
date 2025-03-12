<?php
include 'db.inc.php'; // Include the database connection

// Fetch all records from the database for the dropdown and the table
$sql = "SELECT personID, firstName, lastName, EmailAddress, PhoneNumber, DOB FROM Person";
$result = $con->query($sql);

// Initialize variables for selected person's details
$selectedPerson = null;

// Check if a person is selected
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the details of the selected person
    $sql = "SELECT * FROM Person WHERE personID = $id";
    $selectedResult = $con->query($sql);

    if ($selectedResult->num_rows > 0) {
        $selectedPerson = $selectedResult->fetch_assoc();
    } else {
        echo "Record not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../stle.css">
    <title>Select Person</title>
    <script>
        // Automatically submit the form when the dropdown selection changes
        function showDetails() {
            document.getElementById("personForm").submit();
        }
    </script>
</head>
<body>
    <h2>Select Person</h2>

    <!-- Dropdown Form -->
    <form id="personForm" action="listbox.php" method="GET">
        <select name="id" onchange="showDetails()">
            <option value="">Select a person</option>
            <?php
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['personID'] == ($_GET['id'] ?? '')) ? 'selected' : '';
                echo "<option value='{$row['personID']}' $selected>{$row['firstName']} {$row['lastName']}</option>";
            }
            ?>
        </select>
    </form>

    <!-- Display Selected Person's Details in a Table -->
    <?php if ($selectedPerson): ?>
        <h2>Details of Selected Person</h2>
        <table border="1">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo $selectedPerson['firstName']; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $selectedPerson['lastName']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $selectedPerson['EmailAddress']; ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php echo $selectedPerson['PhoneNumber']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $selectedPerson['DOB']; ?></td>
            </tr>
        </table>
    <?php endif; ?>


























    
    <!-- Display All Persons in a Table -->
    <h2>All Persons</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
        </tr>
        <?php
        // Reset the result pointer to the beginning
        $result->data_seek(0);

        // Loop through all persons and display them in the table
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['personID']; ?></td>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['lastName']; ?></td>
                <td><?php echo $row['EmailAddress']; ?></td>
                <td><?php echo $row['PhoneNumber']; ?></td>
                <td><?php echo $row['DOB']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    
<form action="../menu.php" method="post">
    <button type="submit" class="btn bt" value="Return to insert Page"> Return to Main Page</button>
    
</form>
</body>
</html>