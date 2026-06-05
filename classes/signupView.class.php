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
                echo htmlspecialchars($error) . '</br>';
            }
        }
        unset($_SESSION['signupErrors']);
    }
}
