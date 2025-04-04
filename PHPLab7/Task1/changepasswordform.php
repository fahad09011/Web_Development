<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: loginform.php');
    exit();
}

// Get success or error message from session
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;

// Clear the messages after displaying them
unset($_SESSION['success']);
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password | Page</title>
    <link rel="stylesheet" href="./logincss.css" />
    <style>
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <!-- <<<<<<< LOGIN SECTION >>>>>>>> -->
    <section class="login_page_section">
        <!-- main container -->
        <!-- <div class="login_page_main_container"> -->
        <!-- logo and name conatiner -->
        <div class="logo_name_Container">
            <img src="/Assets/images/login_page_logo.png" alt="logo" class="logo" />
            <h2 class="name">Garage Management System</h2>
        </div>
        <!-- LOGIN FORM container -->
        <div class="login_form_contanier">
            <div class="form_title_container">
                <h2 class="form_title">Change Your Password</h2>
            </div>

            <!-- Display success or error message -->
            <?php if ($success): ?>
                <div class="message success">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="message error">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <!-- login form  -->
            <form action="./changepassword.php" class="login_form" method="post" id="changeform">
                <!-- input conatiner ==OLD PASSWORD== -->
                <div class="input_main_container">
                    <label for="old_password">Old Password</label>
                    <input type="text" id="old_password" name="old_password" placeholder="Enter Old Password" required />
                </div>
                <!-- input conatiner ==NEW PASSWORD== -->
                <div class="input_main_container">
                    <label for="new_password">New Password</label>
                    <input type="text" id="new_password" name="new_password" placeholder="Enter New Password" required />
                </div>
                <!-- input conatiner == confirm NEW PASSWORD== -->
                <div class="input_main_container">
                    <label for="confirm_new_password">Confirm Password</label>
                    <input type="text" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" required />
                </div>
                <!-- login button -->
                <div class="login_button_container">
                    <button type="submit" class="login_button" id="login_button">
                        Change Password
                    </button>
                </div>
            </form>
        </div>
        <!-- </div> -->
    </section>
    <script src="./script.js"></script>
</body>

</html>