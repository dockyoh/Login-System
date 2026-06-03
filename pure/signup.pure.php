<?php

require_once 'classAutoLoader.pure.php';

if (isset($_SERVER['REQUEST_METHOD']) === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];

    //INPUT


    //PROCESS user inputs

    //OUTPUT process results

} else {
    header('Location: ../index.php?post=not_use');
    die();
}
