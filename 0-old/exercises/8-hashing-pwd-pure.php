<?php

$signupPassword = '123';

$options = ['loading' => 15];

$hashSignupPWD = password_hash($signupPassword, PASSWORD_BCRYPT, $options);

$loginPassword = '1234';

if (password_verify($loginPassword, $hashSignupPWD)) {
    echo "VALID PASSWORD";
} else {
    echo "INVALID PASSWORD";
}
