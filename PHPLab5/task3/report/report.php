<?php
include 'dbConnection.php';

$sort = 'firstName';
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
}

$allowed_parameters_for_sort = ['firstName', 'lastName', 'DOB', 'EmailAddress'];
if (!in_array($sort, $allowed_parameters_for_sort)) {
    $sort = 'firstName';
}

$sql = "SELECT `personID`, `firstName`, `lastName`, `EmailAddress`, `PhoneNumber`, `DOB`, `delete_flag` FROM `Person` WHERE `delete_flag` = '0' ORDER BY $sort";
$select_query = $con->query($sql);

if (!$select_query) {
    die("Query failed: " . $con->error);
}
$result = [];
while ($row = $select_query->fetch_assoc()) {
    $result[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Report</title>
    <link rel="stylesheet" href="style.css"> <!-- Fixed typo in CSS file name -->
</head>
<body>
    <h1>Person Report</h1>
    <form action="" method="POST" class="form" id="form">
        <button type="submit" class="button buttons" name="sort" value="EmailAddress">Sort by Email</button>
        <button type="submit" class="button buttons" name="sort" value="firstName">Sort by First Name</button>
        <button type="submit" class="button buttons" name="sort" value="lastName">Sort by Last Name</button>
        <button type="submit" class="button buttons" name="sort" value="DOB">Sort by Date of Birth</button>
    </form>

    <table>
        <tr>
            <th>First Name:</th>
            <th>Last Name:</th>
            <th>Email Address</th>
            <th>PhoneNumber</th>
            <th>Date of Birth</th>
        </tr>
        <?php
        foreach ($result as $rs) {
            echo "
            <tr>
                <td>{$rs['firstName']}</td>
                <td>{$rs['lastName']}</td>
                <td>{$rs['EmailAddress']}</td>
                <td>{$rs['PhoneNumber']}</td>
                <td>{$rs['DOB']}</td>
            </tr>";
        }
        ?>
    </table>

    <!-- Return to Menu Button -->
    <a href="../task3/menu.php"><button type="button">Return to Menu</button></a>

    <script>
        let allButtons = document.querySelectorAll(".buttons");

        allButtons.forEach(button => {
            button.addEventListener("click", (event) => {

                // Disable all buttons
                allButtons.forEach(btn => {
                    btn.setAttribute("disabled", "disabled");
                });

                // Re-enable the clicked button
                button.removeAttribute("disabled");

                // Re-enable all buttons after 2 seconds
                setTimeout(() => {
                    allButtons.forEach(btn => {
                        btn.removeAttribute("disabled");
                    });
                }, 2000);

            });
        });
    </script>
</body>
</html>