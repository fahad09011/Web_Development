<?php
include 'dbConnection.php';

$sort = 'personID';
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
}


$allowed_parameters_for_sort = ['personID' , 'firstName', 'lastName', 'DOB', 'EmailAddress'];
if (!in_array($sort, $allowed_parameters_for_sort)) {
    $sort = 'personID';
}


$sql = "SELECT `personID`, `firstName`, `lastName`, `EmailAddress`, `PhoneNumber`, `DOB`, `delete_flag` FROM `Person` WHERE `delete_flag` = '0' ORDER BY $sort ";

$select_query = $con->query($sql);

if (!$select_query) {
    die("Query failed:".$con->error);
}
$result = [] ;
while ($row = $select_query->fetch_assoc()) {
    $result[] = $row;
}
?>