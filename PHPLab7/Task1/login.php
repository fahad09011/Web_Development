
<?php
// SELECT `Login_name`, `password` FROM `user` WHERE `Login_name` = ''  AND  `password` = '' ;
// here is databse connection file 
include './DBconnectio.php';
session_start();

// here cgecking the form form if the form method is "POST" then the if statement runs
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // here assigning the form data to variables
    $loginName = $_POST['email'];
    $password  = $_POST['Password'];
    // its a sql statemtn for select the user by name/email
    try {

        $select_user = $connection->prepare("SELECT * FROM `user` WHERE `Login_name` =:login");
        $select_user->bindParam(':login', $loginName);
        $select_user->execute();

        //  fetching user data from database 
        $user = $select_user->fetch(PDO::FETCH_ASSOC);
        // if you want to use "password_verify()" then you must store your password whith hashing because this function is just working with hashed passwors
        // in my case just use simle comparison "==" / "==="
        if ($user && $password === $user['password']) {
            // here storing the user data from database in session variables
            $_SESSION['user_id'] = $user['User_ID'];
            $_SESSION['loginName'] = $user['Login_name'];

            // after succesfull login the page directs to chnages password page directly
            header('Location: changepasswordform.php');
            // header('Location: main.php');

            echo " succesfull Login";
            exit();
        } else {
            echo "inavlid apssowrd or use name";
            echo "
<script>alert('Invalid Password or User Name')</script>";
           
        }
    } catch (PDOException $e) {
        error_log("database error check login.php file" . $e->getMessage());
        echo ("database error check login.php file" . $e->getMessage());
    }
}
?>








<!-- For change Password -->