<?php
session_start();
$number = filter_input(INPUT_GET, "num", FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, "operation", FILTER_SANITIZE_STRING) ?? "multiply";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Operations in PHP</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php include("view/header.php"); ?>

    <div class="container">
        <?php
        if ($number) {
            include("view/results.php");
        } else {
            include("view/form.php");
        }
        ?>
    </div>

    <?php include("view/footer.php"); ?>
</body>

</html>