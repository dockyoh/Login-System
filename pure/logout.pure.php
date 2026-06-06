<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['logUser']);
    headerDie();
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../index.php');
    die();
}
