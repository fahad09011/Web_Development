<?php
$height=$_POST['height'];
$weight=$_POST['weight'];
$BMI = $weight/($height*$height);
echo "Your height in meters : ".$height."\n";
echo "Your weight in in kgs : ".$weight."\n";
echo "Your BMI : ".$BMI;
?>