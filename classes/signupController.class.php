<?php

// declare(strict_types=1);
session_start();

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
            $this->errors['empty'] = 'FILL ALL THE INPUT FIELDS!';
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

    public function isErrors()
    {
        $emptyError = $this->isEmpty();
        $pwdError = $this->isPwdMatch();
        if ($emptyError || !$pwdError) {
            return true;
        } else {
            $this->handleErrors();
            return false;
        }
    }

    private function handleErrors()
    {
        if (!empty($this->errors)) {
            $_SESSION['signupErrors'] = $this->errors;
        } else {

            $_SESSION['signupErrors'] = ['noError' => 'LOGIN SUCCESSFULLY!'];
        }
    }

    public function addNewUser()
    {
        if (!$this->isEmpty() && $this->isPwdMatch()) {
            $this->SignupModel->insertData($this->username, $this->confirmPassword, $this->email);
        }
    }
}
