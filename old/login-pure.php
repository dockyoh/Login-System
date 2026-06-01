<?php
require_once 'db-connector-pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header('Location: ../index.php');
        die();
    } else {
        try {
            $query = "SELECT * FROM users WHERE email = :email;";

            $statement = $pdo->prepare($query);

            $statement->bindParam(':email', $email);

            $statement->execute();

            $usersResults = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($usersResults as $result) {
                if (password_verify($password, $result['pwd'])) {
                    $pdo = null;
                    $statement = null;

                    require_once 'session-config-pure.php';
                    $_SESSION['welcome_user'] = htmlspecialchars($result['username']);

                    header('Location: ../dashboard.php');
                    die();
                } else {
                    header('Location: ../index.php');
                    die();
                }
            }
        } catch (PDOException $e) {
            die('LOGIN FAILED! ' . $e->getMessage());
        }
    }
} else {
    header('Location: ../index.php');
    die();
}
