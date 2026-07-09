<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $rawData = file_get_contents('php://input');
    $input = json_decode($rawData, true);

    $prodName = $input['prodName'] ?? '';
    $prodPrice =    $input['prodPrice'] ?? '';
    $prodQuantity = filter_var($input['prodQuantity'], FILTER_SANITIZE_NUMBER_INT) ?? '';

    $productController = new ProductController(null, $prodName, $prodPrice, $prodQuantity, null);

    if ($productController->isErrors()) {
        echo json_encode([
            'ok' => false,
            'errors' => $_SESSION['addErrors']
        ]);
        exit();
    } else {
        $productController->addProduct();
        echo json_encode([
            'ok' => true,
            'errors' => $_SESSION['addErrors']
        ]);
        exit();
    }
}
