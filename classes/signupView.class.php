<?php

// declare(strict_types=1);


class SignupView
{
    private $datas;

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    public function showUser()
    {

        echo 'Welcome ' . $_SESSION['user'] . ' !</br>';
    }

    public function showLoader()
    {
        echo 'Welcome ' . $this->datas . ' !</br>';
    }
}
