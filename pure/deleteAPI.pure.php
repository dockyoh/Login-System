<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');
    $input = json_decode($rawData, true);

    // $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT) ?? '';
    $prodId = $input['prodId'] ?? '';

    $productController = new ProductController($prodId, null, null, null, null);

    $productController->deleteProduct();
    exit();
}
