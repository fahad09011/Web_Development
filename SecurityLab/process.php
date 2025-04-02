<!-- //  File Name: task1 Security lab
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->
<?php
// Include required files
// dbconnection.php contains our database connection
// functions.php contains our validation and database functions
require_once './DBconnection.php';
require_once './functions.php';

// Only process the form if it was submitted via POST
// This prevents direct access to process.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the form input
    // This returns both cleaned data and any validation errors
    $result = validateMemberData($_POST);
    $errors = $result['errors'];
    $submittedData = $result['data'];
    
    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Attempt to insert the member data into the database
        $insertSuccess = insertMember($pdo, $submittedData);
        
        if ($insertSuccess) {
            // On successful insertion, redirect to prevent form resubmission
            // This implements the Post-Redirect-Get (PRG) pattern
            // The success=1 parameter will trigger the success message
            header("Location: index.php?success=1");
            exit(); // Always exit after header redirect
        } else {
            // If database insertion failed, add an error message
            $errors['database'] = "Failed to save member. Please try again.";
        }
    }
}

// If we reach this point, either:
// 1. The form wasn't submitted via POST (direct access)
// 2. There were validation errors
// 3. Database insertion failed
// In all cases, we'll show the form again with any error messages
// We include index.php which will display the form and errors
require 'index.php';
?>