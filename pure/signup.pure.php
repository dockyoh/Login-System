<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];

    //INPUT
    $signupController =  new SignupController($username, $password, $confirmPassword, $email);
    $signupView = new SignupView();

    //PROCESS user inputs
    if ($signupController->isErrors()) {
        headerDie();
    } else {
        $signupController->addNewUser();
        headerDie();
    }
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../index.php');
    die();
}
