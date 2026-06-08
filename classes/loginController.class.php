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
        // $this->loginView = new LoginView();
    }

    private function isInputEmpty()
    {
        if (empty($this->email) || empty($this->password)) {
            $this->errors['emptyInput'] = 'PLEASE FILL ALL THE INPUT FIELDS!';
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
            $this->errors['invalidEmail'] = 'PLEASE PROVIDE A VALID EMAIL!';
            $this->handleErrors();
            return false;
        }
    }

    private function isValidPassword()
    {
        if ($this->loginModel->logPassword($this->email, $this->password)) {
            return true;
        } else {
            $this->errors['invalidPassword'] = 'PLEASE PROVIDE A VALID PASSWORD!';
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
            $this->handleErrors();
            return false;
        }
    }

    private function handleErrors()
    {
        if (!empty($this->errors)) {
            $_SESSION['loginErrors'] = $this->errors;
        } else {
            $_SESSION['loginErrors'] = ['noErrors' => 'LOGIN SUCCESSFULLY!'];
            $_SESSION['logUser'] = $this->email;
        }
    }

    public function logValidUser()
    {
        $validEmail = $this->isValidEmail();
        $validPassword = $this->isValidPassword();
        if ($validEmail && $validPassword) {
            return true;
        } else {
            $this->handleErrors();
            return false;
        }
    }
}
