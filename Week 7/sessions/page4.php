<?php
session_start();

unset($_SESSION['name']);

session_destroy();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAge 4 Sessions </title>
</head>

<body>
    <a href="page3.php">Page 3</a>
</body>

</html>