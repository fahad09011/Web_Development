
<?php
$hostname = "localhost";
$username= "persons";
$password="fahad@1029";
$dbname="c00311349";
$con = mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){
    echo"failed to coonect database: ". mysqli_connect_error();
}
$sql = "Select * from Person";
$result = mysqli_query($con,$sql);
echo "<br> the person tablehave th efollowing records:<br>";
while ($row=mysqli_fetch_array($result)){
    echo $row['personID'] . "  " . $row['firstName'] . "  " . $row['lastName'] . "  " . $row['DOB'] . "<br>";
}

?>