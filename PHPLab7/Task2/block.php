<?php
session_start();
$block_duration = 3; // Block duration in seconds (must match login.php)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Blocked</title>
    <style>
        .countdown {
            font-size: 1.5em;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Account Blocked</h1>
    <p>You have exceeded the maximum number of login attempts. Please try again after <span id="countdown" class="countdown"></span> seconds.</p>
    <p>You will be automatically redirected to the login page.</p>

    <script>
        // Block time in seconds (must match the value in login.php)
        const blockTime = <?php echo $block_duration; ?>;

        // Display the countdown timer
        let timeLeft = blockTime;
        const countdownElement = document.getElementById('countdown');

        const countdownInterval = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;

            // Redirect to the login page when the countdown reaches 0
            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                window.location.href = 'loginform.php?reset=true'; // Redirect with reset flag
            }
        }, 1000);
    </script>
</body>
</html>