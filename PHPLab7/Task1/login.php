<!-- //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->

<?php
session_start();
include './DBconnectio.php';

$max_attempt = 3; // Maximum allowed login attempts
$block_duration = 3; // Block duration in seconds

// Initialize session variables
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['block_time'] = 0;
}

// Check if user is blocked
if ($_SESSION['login_attempts'] >= $max_attempt) {
    

    if (time() - $_SESSION['block_time'] < $block_duration) {
        // here storing the error message into SESSION varialbes to show on login page form
        $_SESSION['error'] = "You have exceeded the maximum number of login attempts. Please try again after " . ($block_duration - (time() - $_SESSION['block_time'])) . " seconds.";
        header('Location: loginform.php');
        exit();
    } else {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['block_time'] = 0;
    }
}


// here cgecking the form form if the form method is "POST" then the if statement runs
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // here assigning the form data to variables
      $loginName = $_POST['email'];
      $password  = $_POST['Password'];
      // its a sql statemtn for select the user by name/email
    

    try {
        // fetching user dtaa from data base
        $select_user = $connection->prepare("SELECT * FROM `user` WHERE `Login_name` = :login");
        // add data/login name into SQL query by named placeholder , its a secure method
        $select_user->bindParam(':login', $loginName);
        // here execute the query
        $select_user->execute();
        $user = $select_user->fetch(PDO::FETCH_ASSOC);

        // if you want to use "password_verify()" then you must store your password whith hashing because this function is just working with hashed passwors
        // in my case just use simle comparison "==" / "==="
        
        if ($user && $password === $user['password']) {
                        // reset the login atempts after suceesfull login to sustem
                        $_SESSION['login_attempts'] = 0;
                        $_SESSION['block_time'] = 0;
                        // here storing the user data from database in session variables
                        $_SESSION['user_id'] = $user['User_ID'];
                        $_SESSION['loginName'] = $user['Login_name'];
            
                        // after succesfull login the page directs to chnages password page directly
                        header('Location: main.php');
                        // header('Location: main.php');
            
            exit();
        } else {
// this block of code runs when while wrong attempt
            
            $_SESSION['login_attempts']++;
            // here checking the number of attempts
            if ($_SESSION['login_attempts'] >= $max_attempt) {
                // storing the time into blck time SESSION VARIABLE
                $_SESSION['block_time'] = time();
                // Store the error message in SESSION VARIABLE to show on the login page form
                $_SESSION['error'] = "You have exceeded the maximum number of login attempts. Please try again after " . $block_duration . " seconds.";
                header('Location: block.php');
            } else {
                // idher issue a raha hai agr location block.php lrta ho to hr idher chla jat ahi aor abgr login krt HO TO LOGIN PE HI REHTA BLOCK PE NI JATA
                $_SESSION['error'] = "Invalid username or password. Attempts remaining: " . ($max_attempt - $_SESSION['login_attempts']);
header('Location: loginform.php');
            }
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