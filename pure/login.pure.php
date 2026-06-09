<?php
require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $loginController = new LoginController($email, $password);

    if ($loginController->isLogedIn()) {
        headerDie('Location: ../public/addProduct.public.html');
    } else {
        if ($loginController->isErrors()) {
            headerDie('Location: ../index.php');
        } else {
            $loginController->logValidUser();
            headerDie('Location: ../index.php');
        }
    }
} else {
    headerDie('Location: ../index.php');
}

function headerDie($location)
{
    header($location);
    die();
}
