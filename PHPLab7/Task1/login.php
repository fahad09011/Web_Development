<?php
// SELECT `Login_name`, `password` FROM `user` WHERE `Login_name` = ''  AND  `password` = '' ;
// here is databse connection file 
session_start();
include './DBconnectio.php';

// max attempts 
$max_attempt = 3;

// here cgecking the form form if the form method is "POST" then the if statement runs
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // here assigning the form data to variables
    $loginName = $_POST['email'];
    $password  = $_POST['Password'];
    // its a sql statemtn for select the user by name/email


    // check if the user is block or the use exceed attempt limit if yes then go to block page 
    if ($_SESSION['login_attempt'] >= $max_attempt) {
        header('location:block.php');
        exit();
    }

    try {

        $select_user = $connection->prepare("SELECT * FROM `user` WHERE `Login_name` =:login");
        $select_user->bindParam(':login', $loginName);
        $select_user->execute();

        //  fetching user data from database 
        $user = $select_user->fetch(PDO::FETCH_ASSOC);
        // if you want to use "password_verify()" then you must store your password whith hashing because this function is just working with hashed passwors
        // in my case just use simle comparison "==" / "==="
        if ($user && $password === $user['password']) {
            // reset the login atempts after suceesfull login to sustem
            $_SESSION['login_attempt'] = 0;
            // here storing the user data from database in session variables
            $_SESSION['user_id'] = $user['User_ID'];
            $_SESSION['loginName'] = $user['Login_name'];

            // after succesfull login the page directs to chnages password page directly
            header('Location: changepasswordform.php');
            // header('Location: main.php');

            echo " succesfull Login";
            exit();
        } else {

            $_SESSION['login_attempt']++;
            if ($_SESSION['login_attempt'] >= $max_attempt) {
                header('location:block.php');
                exit();
            } else {
                echo "invalid user name and password. Remain Attempts: " . ($max_attempt - $_SESSION['login_attempt']);
            }



            echo "inavlid apssowrd or use name";
        }
    } catch (PDOException $e) {
        error_log("database error check login.php file" . $e->getMessage());
        echo ("database error check login.php file" . $e->getMessage());
    }
}
?>








<!-- For change Password -->