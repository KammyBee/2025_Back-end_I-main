<?php

setcookie('username', 'John Doe', time() + (86400 * 30));
setcookie('username', 'John Doe', time() - 3600);

if (isset($_COOKIE['username'])) {
    echo 'username ' . $_COOKIE['username'] . ' is set';
} else {
    echo 'username is not set';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>

<body>
    <a href="page1.php">Page1</a>
    <a href="page3.php">Page3</a>
</body>

</html>