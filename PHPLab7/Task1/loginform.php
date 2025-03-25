<!-- //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->

<?php
session_start();

// Reset session variables if redirected from block page
if (isset($_GET['reset'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['block_time'] = 0;
}

// Get remaining attempts
$max_attempt = 3; // Maximum allowed login attempts
$remaining_attempts = $max_attempt - ($_SESSION['login_attempts'] ?? 0);

// Get error message from session
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']); // Clear the error message after displaying it
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./logincss.css">
    
</head>
<body>
    <section class="login_page_section">
        <div class="logo_name_Container">
            <img src="/Assets/images/login_page_logo.png" alt="logo" class="logo">
            <h2 class="name">Garage Management System</h2>
        </div>
        <div class="login_form_contanier">
            <div class="form_title_container">
                <h2 class="form_title">Login to your account</h2>
            </div>
            <!-- Display error message -->
             <!-- here access the error message from login.php as the error messages are store in the SESSION varibles -->
            <?php if ($error): ?>
                <div class="error-message">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form action="./login.php" class="login_form" method="post">
                <div class="input_main_container">
                    <label for="email_address"></label>
                    <!-- input type email -->
                    <input type="email" id="email_address" name="email" placeholder="Email" required>
                </div>
                <div class="input_main_container">
                    <label for="password"></label>
                    <input type="password" id="password" name="Password" placeholder="Password" required>
                </div>
                <div class="login_button_container">
                    <button type="submit" class="login_button" id="login_button">
                        Log in with email
                    </button>
                </div>
            </form>
            <!-- Display remaining attempts -->
            <?php if ($_SESSION['login_attempts'] > 0): ?>
                <div class="attempts-message">
                    Remaining login attempts: <?php echo $remaining_attempts; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <script src="./script.js"></script>
</body>
</html>