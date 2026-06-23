<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

$rawData = file_get_contents('php://input');
$input = json_decode($rawData, true);

$prodId = $input['prodId'] ?? '';

$productController = new ProductController($prodId, null, null, null, null);
$productController->deleteProduct();

// viewProducts();

echo json_encode([
    'id' =>  $prodId
]);
exit();
