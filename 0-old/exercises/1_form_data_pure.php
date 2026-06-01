<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST["in-username"]);
    $password = htmlspecialchars($_POST["in-password"]);

    if (empty($username) || empty($password)) {
        header("Location: ../test.php");
        exit();
    } else {
        echo "Welcome $username";
    }
} else {
    header("Location: ../test.php");
    exit();
    // echo "Please use the form";
};
