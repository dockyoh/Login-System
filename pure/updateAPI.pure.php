<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');
    $input = json_decode($rawData, true);

    $prodId = filter_var($input['prodId'], FILTER_SANITIZE_NUMBER_INT) ?? '';
    $prodName = $input['prodName'] ?? '';
    $prodPrice = (float)$input['prodPrice'] ?? '';
    $stockQuantity = filter_var($input['stockQuantity'], FILTER_SANITIZE_NUMBER_INT) ?? '';
    $isActive = filter_var($input['isActive'], FILTER_VALIDATE_BOOL) ?? '';

    $productController = new ProductController($prodId,  $prodName,  $prodPrice,  $stockQuantity,  $isActive);

    $productController->updateProduct();

    echo json_encode([
        'productUpdated' => [
            'prodId' => $prodId,
            'prodName' => $prodName,
            'prodPrice' => $prodPrice,
            'stockQuantity' => $stockQuantity,
            'isActive' => $isActive
        ]
    ]);
    exit();
}
