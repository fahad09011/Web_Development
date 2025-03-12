
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = intval($_POST['day']);
    $month = intval($_POST['month']);
    $year = intval($_POST['year']);

    // Check if the date is valid
    if (checkdate($month, $day, $year)) {
        // Create a DateTime object
        $date = new DateTime("$year-$month-$day");
        // Get the day of the week
        $dayOfWeek = $date->format('l');
        echo "The day of the week for $day/$month/$year is $dayOfWeek.";
    } else {
        echo "The date you entered is not valid.";
    }
} else {
    echo "Please submit the form.";
}
?>
