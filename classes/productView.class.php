<?php

// session_start();

class ProductView
{

    public function showAddErros()
    {
        if (isset($_SESSION['addErrors'])) {
            $errors = $_SESSION['addErrors'];

            foreach ($errors as $error) {
                echo htmlspecialchars($error) . '</br>';
            }
        }
        unset($_SESSION['addErrors']);
    }

    public function viewProducts()
    {
        $productModel = new ProductModel();

        $products = $productModel->getProduct();

        return $products;
        // include '../public/dashboard.public.php';
    }
}
