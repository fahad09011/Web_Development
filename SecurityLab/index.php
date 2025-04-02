<!-- //  File Name: task1 Security lab
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->
<?php
// Include required files
// dbconnection.php contains the database connection
// functions.php contains our validation and insert functions
require_once './DBconnection.php';
require_once './functions.php';

// Initialize variables to hold submitted data and errors
// These will be populated when the form is submitted
$submittedData = [];
$errors = [];

// Check if this is a success redirect after form submission
// The 'success' parameter is set in process.php after successful submission
$showSuccess = isset($_GET['success']) && $_GET['success'] == 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Registration</title>
    <!-- Link to our CSS file for styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Main container div for styling purposes -->
    <div class="container">
        <!-- Page heading -->
        <h1>Member Registration</h1>
        
        <?php if ($showSuccess): ?>
            <!-- Success message displayed after successful form submission -->
            <div class="success-message">
                <p>Member registration successful!</p>
                <!-- Link to register another member -->
                <a href="index.php">Register another member</a>
            </div>
        <?php else: ?>
            <!-- Display errors if there are any -->
            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <h3>Please correct the following errors:</h3>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <!-- htmlspecialchars() prevents XSS by escaping special characters -->
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Registration form - submits to process.php -->
            <form action="process.php" method="post">
                <!-- Name input field -->
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <!-- 
                        The value attribute preserves user input between submissions
                        htmlspecialchars() prevents XSS attacks
                        The null coalescing operator (??) provides a default empty string
                    -->
                    <input type="text" id="name" name="name" required
                           value="<?= htmlspecialchars($submittedData['name'] ?? '') ?>">
                </div>
                
                <!-- Email input field -->
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required
                           value="<?= htmlspecialchars($submittedData['email'] ?? '') ?>">
                </div>
                
                <!-- IP Address input field -->
                <div class="form-group">
                    <label for="ip">IP Address:</label>
                    <input type="text" id="ip" name="ip" required
                           value="<?= htmlspecialchars($submittedData['ip'] ?? '') ?>">
                </div>
                
                <!-- Submit button -->
                <button type="submit">Register Member</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>