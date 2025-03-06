<?php
session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];

if (isset($_SESSION['counter'])) {
    $_SESSION['counter']++;
} else {
    $_SESSION['counter'] = 1;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2 session</title>
</head>

<body>
    <h1>Hello i'm <?= $name ?> and my email is <?= $email ?> </h1>
    <h1>You have visited this page <?= $_SESSION['counter'] ?> times</h1>
    <a href="page1.php">page 1</a>
    <a href="page3.php">page 3</a>
</body>

</html>