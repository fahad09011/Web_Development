<!-- //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Paasword|page</title>
    <link rel="stylesheet" href="./logincss.css" />
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

            <!-- login form  -->
            <form action="./changepassword.php" class="login_form" method="post" id="changeform">
                <!-- input conatiner ==OLD PASSWORD== -->
                <div class="input_main_container">
                    <label for="old_password">Old Password</label>
                    <input type="text" id="old_password" name="old_password" placeholder="Enter Old Paasword" />
                </div>
                <!-- input conatiner ==NEW PASSWORD== -->
                <div class="input_main_container">
                    <label for="new_password">New Password</label>
                    <!-- just change the input type password to text , will chnage it later on -->
                    <input type="text" id="new_password" name="new_password" placeholder="Enter New Password" />
                </div>

                <!-- input conatiner == confirm NEW PASSWORD== -->
                <div class="input_main_container">
                    <label for="confirm_new_password">Confirm Password</label>
                    <!-- just change the input type password to text , will chnage it later on -->
                    <input type="text" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" />
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