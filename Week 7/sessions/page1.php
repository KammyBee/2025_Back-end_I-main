<?php
if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];

    header('Location: page2.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1 sessions </title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="name" placeholder="Enter Name">
        <input type="text" name="email" placeholder="Enter Email">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>