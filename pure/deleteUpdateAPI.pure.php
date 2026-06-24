<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');
    $input = json_decode($rawData, true);

    $prodId = $input['prodId'] ?? '';
    $isDelete = $input['delete'] ?? '';
    $isUpdate = $input['update'] ?? '';

    $productController = new ProductController($prodId, null, null, null, null);

    if ($isDelete) {
        $productController->deleteProduct();
        exit();
    }
    if ($isUpdate) {
        $productController->updateProduct();
        exit();
    }
}
