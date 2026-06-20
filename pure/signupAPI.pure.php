<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');
    $input = json_decode($rawData, true);

    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';
    $repeatPassword = $input['repeatPassword'] ?? '';
    $email = $input['email'] ?? '';

    $secureUsername = htmlspecialchars($username);
    $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    $signupController = new SignupController($secureUsername, $password, $repeatPassword, $cleanEmail);

    if ($signupController->isErrors()) {
        $errorList = $signupController->getErrors();

        echo json_encode([
            'failed' => true,
            'error' => [
                'empty' => $errorList['empty'] ?? false,
                'passwordMatch' => $errorList['passwordMatch'] ?? false,
                'userTaken' => $errorList['userTaken'] ?? false,
                'emailTaken' => $errorList['emailTaken'] ?? false
            ]
        ]);
        exit();
    }

    echo json_encode([
        'success' => true,
        'message' => 'signup successfully, welcome ' . $username,
        'user' => $username ?? true
    ]);

    $signupController->addNewUser();

    exit();
} else {
    header('Location: ../index.html');
    exit();
}
