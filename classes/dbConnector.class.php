<?php

class DbConnector
{
    protected function connect()
    {
        try {
            $host = 'localhost';
            $dbUser = 'root';
            $dbPassword = '';
            $dbName = 'myfirstdatabase';

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $dsn = "mysql:host=$host;dbname=$dbName";

            $pdo = new PDO($dsn, $dbUser, $dbPassword, $options);

            return $pdo;
        } catch (PDOException $e) {
            die("CONNECTION FAILED! " . $e->getMessage());
        }
    }
}
