<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    session_destroy();

    headerDie();
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../index.php');
    die();
}
