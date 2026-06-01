<?php
require_once 'db-connector-pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (empty($username) || empty($password) || empty($email)) {
        header('Location: ../index.php');
        die();
    } else {
        try {
            $query = 'INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);';

            $statement = $pdo->prepare($query);

            $options = ['loading' => 15];
            $hashedPWD = password_hash($password, PASSWORD_BCRYPT, $options);

            $statement->bindParam(':username', $username);
            $statement->bindParam(':pwd', $hashedPWD);
            $statement->bindParam(':email', $email);

            $statement->execute();

            $pdo = null;
            $statement = null;

            require_once 'session-config-pure.php';
            $_SESSION['welcome_user'] = htmlspecialchars($username);

            header('Location: ../dashboard.php');
            die();
        } catch (PDOException $e) {
            die('SIGNUP FAILED! ' . $e->getMessage());
        }
    }
} else {
    header('Location: ../index.php');
    die();
}
