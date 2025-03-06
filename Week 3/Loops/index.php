<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>
        <?php
        // While Loop 
        $counter = 0;
        while ($counter < 5) {
            echo $counter . "<br>";
            $counter++;
        }
        // For Loop 
        $message = null;
        for ($counter = 10; $counter > 0; $counter--) {
            $message = $message . $counter . "<br>";
        }
        echo $message;

        //while loop in array 
        $arr = ["john", "jane", "paul", "penny"];
        while ($counter < count($arr)) {
            echo $arr[$counter] . "<br>";
            $counter++;
        }

        //For loop in array
        for ($counter = 0; $counter < count($arr); $counter++) {
            echo $arr[$counter] . "<br>";
        }
        ?>
    </h1>
</body>

</html>