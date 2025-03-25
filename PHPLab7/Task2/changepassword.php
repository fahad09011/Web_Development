<?php
session_start();
include './DBconnectio.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: loginform.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Validate new password and confirm password
    if ($new_password !== $confirm_new_password) {
        $_SESSION['error'] = "New password and confirm password do not match.";
        header('Location: changepasswordform.php');
        exit();
    }

    try {
        // Fetch old password from the database
        $fetch_old_password = $connection->prepare("SELECT `password` FROM `user` WHERE `User_ID` = :user_id;");
        $fetch_old_password->bindParam(':user_id', $_SESSION['user_id']);
        $fetch_old_password->execute();
        $user_password = $fetch_old_password->fetch(PDO::FETCH_ASSOC);

        // Verify old password
        if ($old_password === $user_password['password']) {
            // Check if new password is the same as the current password
            if ($new_password === $user_password['password']) {
                $_SESSION['error'] = "New password must not be the same as the existing password.";
                header('Location: changepasswordform.php');
                exit();
            }

            // Update the password
            $update_password = $connection->prepare("UPDATE `user` SET `password` = :new_pass WHERE `User_ID` = :user_id;");
            $update_password->bindParam(':new_pass', $new_password);
            $update_password->bindParam(':user_id', $_SESSION['user_id']);
            $update_password->execute();

            $_SESSION['success'] = "Password successfully changed.";
            header('Location: changepasswordform.php');
            exit();
        } else {
            $_SESSION['error'] = "Current password does not match.";
            header('Location: changepasswordform.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "An error occurred. Please try again.";
        header('Location: changepasswordform.php');
        exit();
    }
}
?>