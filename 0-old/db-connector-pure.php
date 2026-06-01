<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "myfirstdatabase";

try {
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Connection failed");
}
