<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 2</title>
</head>

<body>
    <?php
    #variables 
    $firstName = "John"; //string
    $lastName = "Doe";
    $age = 23; //Integer 
    $courses = ["BE1", "FE1", "M1", "BE2"]; //array
    $greeting = "Hello, ";
    ?>


    <h1><?php echo $firstName . $lastName; ?></h1>
    <?php echo $courses[1] ?>
    <?php echo $greeting . $firstName ?>
    <?php echo $greeting .= "How are you $firstName"  ?>
    <br>
    <?php
    if ($firstName === "John") {
        echo "Equal";
    } else {
        echo "Not Equal";
    }
    ?>
    <br>
    <?php if ($firstName === "john") { ?>
        Equal
    <?php } else { ?>
        Not Equal
    <?php } ?>
    <br>
    <?php
    if (gettype($age) === "integer") {
        echo "Equal";
    } else {
        echo "Not Equal";
    }
    ?>
    <br>
    <?php
    if (is_numeric($age)) {
        echo "Equal";
    } else {
        echo "Not Equal";
    }
    ?>

    <br>

    <?php
    $amount = -40;

    if (empty($amount)) {
        $message = "Amount is required";
    } else if (!is_numeric($amount)) {
        $message = "Amount should be numeric";
    } else if (($amount <= 0)) {
        $message = "Amount should be grater than zero";
    } else {
        $message = "Valid Amount";
    }
    echo $message;
    ?>

    <?php


    if ((empty($amount)) || (!is_numeric($amount)) || ($amount <= 0)) {
        $message = "Not valid amount";
    } else {
        $message = "Valid Amount";
    }
    echo $message;

    ?>

</body>

</html>