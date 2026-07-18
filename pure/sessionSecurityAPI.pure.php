<?php

header('Content-Type: application/json');

session_start();

if (!isset($_SESSION['logedUser'])) {
    echo json_encode([
        'ok' => false
    ]);
    exit();
} else {
    echo json_encode([
        'ok' => true,
        'user' => $_SESSION['logedUser']
    ]);
    exit();
}
