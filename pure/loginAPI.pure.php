<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $rawData = file_get_contents('php://input');
    $input = json_decode($rawData, true);

    $email = $input['userEmail'] ?? '';
    $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = $input['userPassword'] ?? '';

    $loginController = new LoginController($cleanEmail, $password);



    if ($loginController->isErrors()) {
        $errorList = $loginController->getErrors();
        echo json_encode([
            'empty' => true,
            'error' => [
                'empty' => $errorList['emptyInput']
            ]
        ]);
        exit();
    }

    if ($loginController->logValidUser()) {
        $logUser = $loginController->getLogUser();
        echo json_encode([
            'success' => true,
            'user' => $logUser
        ]);
        exit();
    } else {
        $errorList = $loginController->getErrors();
        echo json_encode([
            'invalidUser' => true,
            'error' => [
                'invalidEmail' => $errorList['invalidEmail'] ?? false,
                'invalidPassword' => $errorList['invalidPassword'] ?? false
            ]
        ]);
        exit();
    }
} else {
    header('Location: ../index.html');
    exit();
}
