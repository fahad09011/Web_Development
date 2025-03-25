<!-- //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->

<?php
session_start();

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./logincss.css">
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
    <section class="login_page_section">
        <div class="logo_name_Container">
            <img src="/Assets/images/login_page_logo.png" alt="logo" class="logo">
            <h2 class="name">Garage Management System</h2>
        </div>
        <div class="login_form_contanier">
            <div class="form_title_container">
                <h2 class="form_title">Login to your account</h2>
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

            <form action="./login.php" class="login_form" method="post">
                <div class="input_main_container">
                    <label for="email_address"></label>
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
        </div>
    </section>
    <script src="./script.js"></script>
</body>
</html>
<?php
session_start();

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./logincss.css">
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
    <section class="login_page_section">
        <div class="logo_name_Container">
            <img src="/Assets/images/login_page_logo.png" alt="logo" class="logo">
            <h2 class="name">Garage Management System</h2>
        </div>
        <div class="login_form_contanier">
            <div class="form_title_container">
                <h2 class="form_title">Login to your account</h2>
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

            <form action="./login.php" class="login_form" method="post">
                <div class="input_main_container">
                    <label for="email_address"></label>
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
        </div>
    </section>
    <script src="./script.js"></script>
</body>
</html>