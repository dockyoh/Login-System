<?php

// declare(strict_types=1);
require_once '../pure/sessionConfig.pure.php';

class SignupController
{
    private $SignupModel;
    private $signupView;

    private $errors = [];

    private $username;
    private $password;
    private $confirmPassword;
    private $email;


    public function __construct($username, $password, $confirmPassword, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->email = $email;

        $this->SignupModel = new SignupModel();
        $this->signupView = new SignupView();
    }

    private function isEmpty()
    {
        if (empty($this->username) || empty($this->password) || empty($this->confirmPassword) || empty($this->email)) {
            $this->errors['empty'] = 'FILL ALL THE INPUT SHITS!';
            $this->handleErrors();
            return true;
        } else {
            return false;
        }
    }

    private function isPwdMatch()
    {
        if ($this->password === $this->confirmPassword) {
            return true;
        } else {
            $this->errors['passwordMatch'] = 'PASSWORD NOT MATCH!';
            $this->handleErrors();
            return false;
        }
    }

    private function isUserTaken()
    {
        if ($this->SignupModel->checkUserData($this->username)) {
            $this->errors['userTaken'] = 'USERNAME IS ALREADY TAKEN!';
            $this->handleErrors();
            return true;
        } else {
            return false;
        }
    }

    private function isEmailTaken()
    {
        if ($this->SignupModel->checkEmailData($this->email)) {
            $this->errors['emailTaken'] = 'EMAIL IS ALREADY TAKEN!';
            $this->handleErrors();
            return true;
        } else {
            return false;
        }
    }

    public function isErrors()
    {
        $emptyError = $this->isEmpty();
        $pwdError = $this->isPwdMatch();
        $userTaken = $this->isUserTaken();
        $emailTaken = $this->isEmailTaken();
        if ($emptyError || !$pwdError || $userTaken || $emailTaken) {
            return true;
        } else {
            //NO ERRORS
            $this->handleErrors();
            return false;
        }
    }

    public function getErrors()
    {
        return $_SESSION['signupErrors'];
    }

    private function handleErrors()
    {
        if (!empty($this->errors)) {
            $_SESSION['signupErrors'] = $this->errors;
        } else {
            $_SESSION['signupErrors'] = ['noError' => 'SIGNUP SUCCESSFULLY!'];
            $_SESSION['signupLogUser'] = $this->username;
            $_SESSION['isLogedin'] = true;
        }
    }

    public function addNewUser()
    {
        if (!$this->isEmpty() && $this->isPwdMatch() && !$this->isEmailTaken() && !$this->isUserTaken()) {
            $this->SignupModel->insertData($this->username, $this->confirmPassword, $this->email);
        }
    }

    public function isLogedin()
    {
        if (isset($_SESSION['isLogedin'])) {
            $_SESSION['signupErrors'] = ['alreadyLogedin' => 'YOU ALREADY LOGEDIN!'];
            return true;
        } else {
            return false;
        }
    }
}
