<?php

// declare(strict_types=1);
// require_once '../pure/sessionConfig.php';

class SignupController
{
    private $SignupModel;
    private $signupView;

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

    public function isEmpty()
    {
        if (empty($this->username) || empty($this->password) || empty($this->confirmPassword) || empty($this->email)) {
            return true;
        } else {
            return false;
        }
    }

    public function isPwdMatch()
    {
        if ($this->password === $this->confirmPassword) {
            return true;
        } else {
            return false;
        }
    }

    public function addNewUser()
    {
        if (!$this->isEmpty() && $this->isPwdMatch()) {
            $this->SignupModel->insertData($this->username, $this->confirmPassword, $this->email);
        }
    }
}
