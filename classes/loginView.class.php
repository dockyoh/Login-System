<?php

// declare(strict_types=1);


class LoginView
{

    public function showLogErrors()
    {
        if (isset($_SESSION['loginErrors'])) {
            $errors = $_SESSION['loginErrors'];
            foreach ($errors as $error) {
                echo htmlspecialchars($error) . '</br>';
            }
        }
        unset($_SESSION['loginErrors']);
    }

    public function showLogUser()
    {
        if (isset($_SESSION['logUser'])) {
            echo htmlspecialchars($_SESSION['logUser']);
        }
    }
}
