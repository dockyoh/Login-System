<?php
require_once "./pure_php/3-db-connect-pure.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    if (empty($username) || empty($password) || empty($email)) {
        header("Location: ../5-update-delete-data.php");
        die();
    }

    try {
        $query = "UPDATE users SET username = :username, pwd = :pwd, email = :email WHERE id =  5;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $password);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../5-update-delete-data.php");
        die();
    } catch (PDOException $e) {
        die("FAILED TO EDIT DATABASE! " . $e->getMessage());
    }
} else {
    header("Location: ../5-update-delete-data.php");
    die();
}
