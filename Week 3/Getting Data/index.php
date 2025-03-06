<?php
print_r($_GET);
print_r($_POST);
$firstName = htmlspecialchars($_GET['firstName']);
$lastName = $_GET['lastName'];
echo $firstName;
echo $lastName;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Data</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <h1>Web Processor</h1>
        <label for="firstName">Frist Name:</label>
        <input type="text" id="firstName" name="firstName" autocomplete="off">
        <label for="lastName">Frist Name:</label>
        <input type="text" id="lastName" name="lastName" autocomplete="off">
        <div>
            <button type="submit">Submit</button>
            <button type="submit" formmethod="post">Submit using POST</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>

</html>