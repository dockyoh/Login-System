<?php
require_once "./exercises/3-db-connect-pure.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["upUsername"];
    $password = $_POST["upPassword"];
    $email = filter_input(INPUT_POST, "upEmail", FILTER_SANITIZE_EMAIL);

    if (empty($username) || empty($password) || empty($email)) {
        header("Location: ../4-insert-data.php");
        die();
    }

    try {
        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

        $stmt = $pdo->prepare($query);

        $options = ['loading' => 15];

        $hashPWD = password_hash($password, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashPWD);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../4-insert-data.php");
        die();
    } catch (PDOException $e) {
        die("FAILED TO INSERT DATA! " . $e->getMessage());
    }
} else {
    header("Location: ../4-insert-data.php");
    die();
}
