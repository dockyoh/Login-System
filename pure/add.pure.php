<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $price = $_POST['productPrice'];
    $quantity = $_POST['stockQuantity'];

    $addController = new AddController($productName, $price, $quantity);

    if ($addController->isErrors()) {
        headerDie();
    } else {
        $addController->addProduct();
        headerDie();
    }
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../public/addProduct.public.php');
    die();
}
