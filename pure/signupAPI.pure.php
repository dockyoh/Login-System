<?php

header('Content-Type: application/json');

$rawData = file_get_contents('php://input');
$input = json_decode($rawData, true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['message' => 'no data recieved']);
    exit();
}

$username = $input['username'];
$password = $input['pwd'];
$confirmPass = $input['conPass'];
$email = $input['email'];

echo json_encode([
    'status' => 'success',
    'message' => 'user signup successfully!',
    'user' => [
        'username' => $username,
        'password' => $password,
        'confirmPass' => $confirmPass,
        'email' => $email
    ]
]);

exit();
