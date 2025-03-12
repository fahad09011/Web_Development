<!-- Student name : Muhammad Fahad
Student Id: C00311349
Date : 22/01/2025
task 5 php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>
<body>
    <?php 
echo "Date Methods in php : ";

// Set the timezone (optional but recommended)
date_default_timezone_set('UTC');

// Display different date formats
echo date("M j Y") . "<br>";          // Jan 14 2025
echo date("D M Y") . "<br>";          // Tue Jan 2025
echo date("d/m/Y") . "<br>";          // 14/01/2025
echo date("j/n/y") . "<br>";          // 14/1/25
echo date("l, F jS Y") . "<br>";      // Tuesday, January 14th 2025
?>


</body>
</html>