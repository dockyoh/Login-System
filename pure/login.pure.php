<?php
require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $loginController = new LoginController($email, $password);

    if ($loginController->isLogedIn()) {
        headerDie();
    } else {
        if ($loginController->isErrors()) {
            headerDie();
        } else {
            $loginController->logValidUser();
            headerDie();
        }
    }
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../index.php');
    die();
}
