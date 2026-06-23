<?php

header('Content-Type: application/json');

require_once 'classAutoLoader.pure.php';

viewProducts();
deleteProduct();

function viewProducts()
{
    $productView = new ProductView();
    $products = $productView->viewProducts();

    // $products = [
    //     ['id' => 1, 'name' => 'nails', 'price' => '15.00', 'quantity' => '50', 'isActive' => '1', 'createdAt' => '2026-06-12 11:30:15'],
    //     ['id' => 2, 'name' => 'cement', 'price' => '15.00', 'quantity' => '50', 'isActive' => '1', 'createdAt' => '2026-06-12 11:30:15'],
    //     ['id' => 3, 'name' => 'hammer', 'price' => '15.00', 'quantity' => '50', 'isActive' => '1', 'createdAt' => '2026-06-12 11:30:15']
    // ];

    echo json_encode($products);
    exit();
}


function deleteProduct()
{

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
}
