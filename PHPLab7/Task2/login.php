<!-- //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->
<?php
// Start the session to store user information
session_start();

// Include the database connection file
include './DBconnectio.php';

// Maximum allowed login attempts
$max_attempt = 3;

// Block time in seconds (e.g., 300 seconds = 5 minutes)
$block_duration = 300;

// Initialize session variables for login attempts and block time
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0; // Track failed login attempts
    $_SESSION['block_time'] = 0;     // Track when blocking started
}

// Check if the user is blocked
if ($_SESSION['login_attempts'] >= $max_attempt) {
    // Check if the block duration has passed
    if (time() - $_SESSION['block_time'] < $block_duration) {
        // User is still blocked
        $_SESSION['error'] = "You have exceeded the maximum number of login attempts. Please try again after " . ($block_duration - (time() - $_SESSION['block_time'])) . " seconds.";
        header('Location: loginform.php');
        exit();
    } else {
        // Block duration has passed, reset attempts
        $_SESSION['login_attempts'] = 0;
        $_SESSION['block_time'] = 0;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginName = $_POST['email'];
    $password = $_POST['Password'];

    try {
        // Fetch user data from the database using a prepared statement
        $select_user = $connection->prepare("SELECT * FROM `user` WHERE `Login_name` = :login");
        $select_user->bindParam(':login', $loginName); // Bind the login name parameter
        $select_user->execute();
        $user = $select_user->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($user) {
            // Verify the password (plain-text comparison)
            if ($password === $user['password']) { // Use password_verify() for hashed passwords
                // Reset login attempts on successful login
                $_SESSION['login_attempts'] = 0;
                $_SESSION['block_time'] = 0;

                // Set session variables
                $_SESSION['user_id'] = $user['User_ID'];
                $_SESSION['loginName'] = $user['Login_name'];

                // Check if today is the user's birthday
                $today = date('m-d');
                $userBirthday = date('m-d', strtotime($user['date_of_birth']));

                if ($today === $userBirthday) {
                    $_SESSION['birth'] = "Happy Birthday, " . $user['Login_name'] . "!";
                }

                // Redirect to the dashboard or desired page
                header('Location: main.php');
                exit();
            } else {
                // Increment login attempts on failed login
                $_SESSION['login_attempts']++;

                // Check if the user has exceeded the maximum attempts
                if ($_SESSION['login_attempts'] >= $max_attempt) {
                    $_SESSION['block_time'] = time(); // Set block start time
                    $_SESSION['error'] = "You have exceeded the maximum number of login attempts. Please try again after " . $block_duration . " seconds.";
                } else {
                    $_SESSION['error'] = "Invalid username or password. Attempts remaining: " . ($max_attempt - $_SESSION['login_attempts']);
                }
                header('Location: loginform.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid username or password.";
            header('Location: loginform.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "An error occurred. Please try again.";
        header('Location: loginform.php');
        exit();
    }
}
?>