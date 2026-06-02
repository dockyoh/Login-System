<?php

// declare(strict_types=1);

class SignupController
{
    private $user;
    private $autoLoader;

    public function __construct($user, $loader)
    {
        $this->user = $user;
        $this->autoLoader = $loader;
    }

    public function getUserData()
    {
        require_once '../pure/sessionConfig.pure.php';

        $userSession = $_SESSION['user'] = $this->user;

        return $userSession;
    }

    public function getLoaderData()
    {
        return $this->autoLoader;
    }
}
