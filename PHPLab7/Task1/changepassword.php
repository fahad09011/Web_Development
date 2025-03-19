<?php
// session start
session_start();
// this file contain database connection 
include './DBconnectio.php';
// here checking if the user not logedin into the sstem then go to login page if want to chnage password,the user ID store in session variable in login.php file , here i access the user details by start session
if (!isset($_SESSION['user_id'])) {
    header('Location: loginform.php');
    exit();
}




// here cgecking the form form if the form method is "POST" then the if statement runs
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // comparing new password and confir new password
    if ($new_password !== $confirm_new_password) {
        echo "
        <script>alert('New Paaword do not match')</script>";
        echo "New password do not match ";
        exit();
    }


    try {


        // fetching old password from database for validation , while chaning password the old password also need as well.
        $fetch_old_password = $connection->prepare("SELECT  `password` FROM `user` WHERE `User_ID` = :user_id;");

        $fetch_old_password->bindParam(':user_id', $_SESSION['user_id']);
        // execute query
        $fetch_old_password->execute();
        // fetching user password using PDO (PHP data object)
        $user_password = $fetch_old_password->fetch(PDO::FETCH_ASSOC);


        // compare the old password from databse and the user enter while chnaging password
        if ($old_password === $user_password['password']) {


            // the new passw ord must not be match with the existing password
            if ($new_password === $user_password['password']) {
                echo "
        <script>alert('New Paaword must not be match with the existing password. match')</script>";
                echo "new password must not be match with the existing/current password.";
                exit();
            }

            $update_password= $connection->prepare("UPDATE `user` SET `password`=:new_pass WHERE  `User_ID` =:user_id ;");
            $update_password->bindParam(':new_pass',$new_password);
            $update_password->bindParam(':user_id', $_SESSION['user_id']);
            $update_password->execute();

            echo"password changed successfully";
        }
        else {
            echo"the current password did  not match.";
        }
    } catch (PDOException $e) {
        error_log("database erro check changepassword.php" . $e->getMessage());
    }
}
