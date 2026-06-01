<?php
require_once '9-autoLoader-pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']);
    $operator = htmlspecialchars($_POST['operators']);

    if (empty($num1) || empty($num2)) {
        headerDie();
    }

    if (!is_numeric($num1) || !is_numeric($num2)) {
        headerDie();
    }

    try {
        $calc = new Calc($num1, $operator, $num2);
        $result = $calc->calculator();
        echo $result;
    } catch (PDOException $e) {
        die('FAILED TO CALCULATE! ' . $e->getMessage());
    }
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../9-calc-OOP.php');
    die();
}
