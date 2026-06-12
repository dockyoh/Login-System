<?php

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBtn'])) {
    // $productId = (int)$_POST['productId'];

    $productId = filter_input(INPUT_POST, 'productId', FILTER_SANITIZE_NUMBER_INT);

    $productController = new ProductController($productId, null, null);
    // $deleteModel = new DeleteModel();
    $productController->deleteProduct();
    headerDie();
} else {
    headerDie();
}

function headerDie()
{
    header('Location: ../public/dashboard.public.php');
    die();
}
