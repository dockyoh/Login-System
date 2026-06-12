<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBtn'])) {

    $productId = filter_input(INPUT_POST, 'productId', FILTER_SANITIZE_NUMBER_INT);

    $productController = new ProductController($productId, null, null);
    $productController->updateProduct();
    headerDie();
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../public/dashboard.public.php');
    die();
}
