<?php

header('Content-Type: application/json');

session_start();

if (isset($_SESSION['logedUser']) && isset($_SESSION['isLogedin'])) {
    session_unset();
    session_destroy();

    echo json_encode([
        'ok' => true
    ]);
    exit();
}
