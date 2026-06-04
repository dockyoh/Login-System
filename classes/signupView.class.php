<?php

declare(strict_types=1);


class SignupView
{
    private $errors = [];

    public function setErrors(array $error)
    {
        $this->errors = $error;
    }

    public function showErrors()
    {
        foreach ($this->errors as $error) {
            echo $error;
        }
    }
}
