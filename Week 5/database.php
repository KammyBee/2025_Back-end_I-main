<?php
$dsn = "mysql:host=localhost; dbname=world";
$username = 'root';
// $password = '1qaz2wsx';

try {
    $db = new PDO($dsn, $username);
} catch (PDOException $error) {
    $error_message = 'Database Error!';
    $error_message .= $error->getMessage();
    echo $error_message;
    exit();
}
