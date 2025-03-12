<?php
include 'dbConnection.php';

$sort = 'personID';
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
}


$allowed_parameters_for_sort = ['personID' , 'firstName', 'lastName', 'DOB'];
if (!in_array($sort, $allowed_parameters_for_sort)) {
    $sort = 'personID';
}


$sql = "SELECT `personID`, `firstName`, `lastName`,  `DOB`  FROM `Person` WHERE `delete_flag` = '0'  ORDER BY $sort ";

$select_query = $con->query($sql);

if (!$select_query) {
    die("Query failed:".$con->error);
}
$result = [] ;
while ($row = $select_query->fetch_assoc()) {
    $result[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../task2/stle.css">

    <title>Document</title>
</head>

<body>
    <h1>Person Report</h1>
    <form action="" method="POST" class="form" id="form">
        <label for="option">Sort by</label>
        <select name="sort" id="option">

            <option value="personID"
                <?php echo ($sort == 'personID')
                    ?
                    'selected'
                    :
                    ''
                ?>>ID
            </option>

            <option value="firstName"
                <?php echo ($sort == 'firstName')
                    ?
                    'selected'
                    :
                    ''
                ?>>First Name
            </option>




            <option value="lastName"
                <?php echo ($sort == 'lastName')
                    ?
                    'selected'
                    :
                    ''
                ?>>Last Name
            </option>





            <option value="DOB"
                <?php echo ($sort == 'DOB')
                    ?
                    'selected'
                    :
                    ''
                ?>>Date of Birth
            </option>



        </select>
    </form>



    <table>
        <tr>
            <th>ID:</th>
            <th>First Name:</th>
            <th>Last Name:</th>
            <th>Date of Birth</th>
        </tr>

        <?php
        foreach ($result as $rs)
            echo "
        <tr>
            <td> {$rs['personID']}</td>
            <td> {$rs['firstName']}</td>
            <td>{$rs['lastName']}</td>
            <td>{$rs['DOB']}</td>
        </tr>";
        ?>
    </table>
    
<form action="../menu.php" method="post">
    <button type="submit" class="btn bt" value="Return to insert Page"> Return to Main Page</button>
    <script>
        
        let sort = document.getElementById("option").addEventListener("change", ()=>{
            let form = document.getElementById("form").submit();
        });
    </script>
</body>

</html>












