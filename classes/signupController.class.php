<?php

// declare(strict_types=1);
require_once 'signupView.class.php';

class SignupController extends SignupModel
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

    public function dbDataArray()
    {
        return $this->getDbData();
    }
}
