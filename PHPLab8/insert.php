<?php
require './authentication.php';
require './DBconnection.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    
    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO persons (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        $message = "Record added successfully!";
    } else {
        $message = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Add a Record</h2>
        <?php if ($message) echo "<p>$message</p>"; ?>
        <form method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Add Record</button>
        </form>
        <a href="menu.php">Back to Menu</a>
    </div>
</body>
</html>