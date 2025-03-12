<!-- Student name : Muhammad Fahad
Student Id: C00311349
Date : 22/01/2025
task 7 php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
</head>
<body>
    <?php 
$associative_array= array("cereal costs"=>5.00 ,"coffee costs"=>"2.50", "Bananas"=>"3.50", "Onions costs"=>"1.00", "Lettuce costs"=>"2.40", "Tomatoes costs"=>"3.50");

foreach($associative_array as $key=>$value){
    echo "$key: $value.<br/>";
}
?>


</body>
</html>