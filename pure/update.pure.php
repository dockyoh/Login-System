<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateButton'])) {

    $productId = (int)filter_input(INPUT_POST, 'productId', FILTER_SANITIZE_NUMBER_INT);
    $name = $_POST['productName'];
    $price = (float)$_POST['productPrice'];
    $quantity = (int)filter_input(INPUT_POST, 'stockQuantity', FILTER_SANITIZE_NUMBER_INT);
    $isActive = filter_var($_POST['isActive'], FILTER_VALIDATE_BOOL); //CONVERT STRING FALSE TO BOOLEAN FALSE

    $productController = new ProductController($productId, $name, $price, $quantity, $isActive);
    $productController->updateProduct();

    if ($productController->isUpdateErrors()) {
        headerDie("Location: ../public/updateProduct.public.php?productId=$productId&productName=$name&price=$price&stockQuantity=$quantity&isActive=$isActive");
    } else {
        headerDie('Location: ../public/dashboard.public.php');
    }
} else {
    headerDie('Location: ../public/updateProduct.public.php');
}

function headerDie($location)
{
    header($location);
    die();
}
