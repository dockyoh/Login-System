<?php

$host = "localhost";
$dbName = "myfirstdatabase";
$dbUsername = "root";
$dbPassword = "";

$dsn = "mysql:host=$host;dbname=$dbName";

try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("CONNECTION FAILED!");
}
