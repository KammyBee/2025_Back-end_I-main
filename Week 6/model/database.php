<?php
$dsn = "mysql:host=localhost; dbname=assignment_tracker";
$username = 'root';
$password = '12345';


try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Database connection is failed");
}
