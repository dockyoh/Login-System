<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $price = $_POST['productPrice'];
    $quantity = $_POST['stockQuantity'];

    $productController = new ProductController($productName, $price, $quantity);

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
