<?php
session_start();

//overwrite the values in session 
// $_SESSION['name'] = 'John Doe';

$name = $_SESSION['name'];
$email = $_SESSION['email'];

$name = isset($_SESSION['name']) ? $_SESSION['name'] : "Guest";
$email = isset($_SESSION['name']) ? $_SESSION['name'] : "Guest";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 3 Sessions</title>
</head>

<body>
    <h1>Hello i'm <?= $name ?> and my email is <?= $email ?> </h1>
    <a href="page2.php">Page 2</a>
    <a href="page4.php">Page 4</a>
</body>

</html>