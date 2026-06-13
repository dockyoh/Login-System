<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $price = $_POST['productPrice'];
    $quantity = filter_input(INPUT_POST, 'stockQuantity', FILTER_SANITIZE_NUMBER_INT);

    $productController = new ProductController(null, $productName, $price, $quantity, null);

    if ($productController->isErrors()) {
        headerDie();
    } else {
        $productController->addProduct();
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
