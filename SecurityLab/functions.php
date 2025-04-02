<!-- //  File Name: task1 Security lab
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->
<?php

function validateMemberData($input) {
    // Initialize arrays to store cleaned data and errors
    $data = [];
    $errors = [];
    // Sanitize the name by removing HTML tags and special characters
    // Basic sanitization (strip tags and trim whitespace)
$data['name'] = trim(strip_tags($input['name'] ?? ''));

// For additional security in HTML context:

    // Check if name is empty after sanitization
    // trim() removes whitespace from both ends
    if (empty(trim($data['name']))) {
        $errors['name'] = "Name is required and cannot be empty";
    }
    
    // First sanitize the email by removing illegal characters
    $data['email'] = filter_var($input['email'] ?? '', FILTER_SANITIZE_EMAIL);
    
    // Then validate the email format
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format";
    }
   
    // Get the raw IP input (we don't sanitize as it might break valid IP formats)
    $data['ip'] = $input['ip'] ?? '';
    
    // Validate the IP address format (supports both IPv4 and IPv6)
    if (!filter_var($data['ip'], FILTER_VALIDATE_IP)) {
        $errors['ip'] = "Invalid IP address format";
    }
    
    // Return both the sanitized data and any validation errors
    return [
        'data' => $data,
        'errors' => $errors
    ];
}


function insertMember($pdo, $data) {
    try {
        // Prepare the SQL statement with named placeholders
        // This prevents SQL injection by separating data from the query structure
        $stmt = $pdo->prepare("
            INSERT INTO member (Name, EmailAddress, IpAddress) 
            VALUES (:name, :email, :ip)
        ");
        
        // Execute the statement with the sanitized data
        // PDO automatically handles proper escaping
        $stmt->execute([
            ':name' => $data['name'],    // Sanitized name
            ':email' => $data['email'],  // Sanitized and validated email
            ':ip' => $data['ip']         // Validated IP address
        ]);
        
        // Return true if the insert was successful
        return true;
        
    } catch (PDOException $e) {
        // Log the detailed error for debugging
        // Never expose database errors directly to users
        error_log("Database insert failed: " . $e->getMessage());
        
        // Return false to indicate failure
        return false;
    }
}
?>