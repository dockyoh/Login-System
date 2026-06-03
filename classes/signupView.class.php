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

        echo 'Welcome ' . htmlspecialchars($_SESSION['user']) . ' !</br>';
    }

    public function showLoader()
    {
        echo 'Welcome ' . htmlspecialchars($this->datas) . ' !</br>';
    }

    public function showDbData()
    {
        foreach ($this->datas as $data) {
            echo htmlspecialchars($data) . '</br>';
        }
    }
}
