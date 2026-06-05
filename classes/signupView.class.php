<?php

declare(strict_types=1);
session_start();


class SignupView
{

    public function showErrors()
    {
        if (isset($_SESSION['signupErrors'])) {
            $errors = $_SESSION['signupErrors'];
            foreach ($errors as $error) {
                echo $error . '</br>';
            }
        } else {
            echo '';
        }
        unset($_SESSION['signupErrors']);
    }
}
