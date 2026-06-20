<?php

header('Content-Type: application/json');

$rawData = file_get_contents('php://input');
$input = json_decode($rawData, true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['message' => 'no data recieved']);
    exit();
} else {
    $username = $input['username'];
    $password = $input['password'];
    $repeatPassword = $input['repeatPassword'];
    $email = $input['email'];

    echo json_encode([
        'status' => 'success',
        'message' => 'user signup successfully!',
        'user' => [
            'username' => $username,
            'password' => $password,
            'repeatPassword' => $repeatPassword,
            'email' => $email
        ]
    ]);

    exit();
}
