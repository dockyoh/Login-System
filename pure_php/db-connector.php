<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "myfirstdatabase";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Connection failed");
}
