<?php
require_once '../pure/sessionConfig.pure.php';

class LoginController
{
    private $email;
    private $password;

    private $errors = [];

    private $loginModel;
    private $loginView;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $this->loginModel = new LoginModel();
    }

    private function isInputEmpty()
    {
        if (empty($this->email) || empty($this->password)) {
            $this->errors['emptyInput'] = 'FILL ALL THE INPUT FIELDS!';
            $this->handleErrors();
            return true;
        } else {
            return false;
        }
    }

    private function isValidEmail()
    {
        if ($this->loginModel->logEmail($this->email)) {
            return true;
        } else {
            $this->errors['invalidEmail'] = 'INVALID EMAIL!';
            $this->handleErrors();
            return false;
        }
    }

    private function isValidPassword()
    {
        if ($this->loginModel->logPassword($this->email, $this->password)) {
            return true;
        } else {
            $this->errors['invalidPassword'] = 'INVALID PASSWORD!';
            $this->handleErrors();
            return false;
        }
    }

    public function isErrors()
    {
        $empty = $this->isInputEmpty();
        if ($empty) {
            return true;
        } else {
            return false;
        }
    }

    private function handleErrors()
    {
        if (!empty($this->errors)) {
            $_SESSION['loginErrors'] = $this->errors;
        } else {
            $_SESSION['loginErrors'] = ['noErrors' => 'LOGIN SUCCESSFULLY!'];
            $_SESSION['logedUser'] = $this->loginModel->getUsername($this->email);
            $_SESSION['isLogedin'] = true;
        }
    }

    public function getErrors()
    {
        return $_SESSION['loginErrors'];
    }

    public function getLogUser()
    {
        return $_SESSION['logedUser'];
    }

    public function logValidUser()
    {
        $validEmail = $this->isValidEmail();
        $validPassword = $this->isValidPassword();
        if ($validEmail && $validPassword) {
            $this->handleErrors();
            return true;
        } else {
            $this->handleErrors();
            return false;
        }
    }

    public function isLogedIn()
    {
        if (isset($_SESSION['isLogedin'])) {
            $_SESSION['loginErrors'] = ['alreadyLogin' => 'YOU ALREADY LOGIN!'];
            return true;
        } else {
            return false;
        }
    }
}
